<?php

namespace App\Controller\Back;

use App\Entity\Question;
use App\Entity\Utilisateur;
use App\Repository\QCMRepository;
use App\Repository\QuestionRepository;
use App\Repository\ReponseRepository;
use App\Utils\QcmUtils;
use Doctrine\Common\Collections\ArrayCollection;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\QCM;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/qcm')]
#[IsGranted('ROLE_USER')]
class QcmController extends AbstractController {
    private QcmUtils $qcmUtils;
    private QCMRepository $QCMRepository;
    private QuestionRepository $QuestionRepository;
    private ReponseRepository $ReponseRepository;
    private SerializerInterface $serializer;

    public function __construct(QcmUtils $qcmUtils, 
        QCMRepository $QCMRepository, 
        QuestionRepository $QuestionRepository, 
        ReponseRepository $ReponseRepository, 
        SerializerInterface $serializer) {
        $this->qcmUtils = $qcmUtils;
        $this->QCMRepository = $QCMRepository;
        $this->QuestionRepository = $QuestionRepository;
        $this->ReponseRepository = $ReponseRepository;
        $this->serializer = $serializer;
    }

    #[Route('/generate/{id}', name: 'app_generate_qcm', requirements: ['id' => '\d+'])]
    public function generate_qcm(int $id): Response {
        $qcm = $this->qcmUtils->getQcm($id);

        if (!$qcm) {
            throw new Exception("Le QCM avec l'id \'" . $id . "\' n'existe pas");
        }

        $content = $this->qcmUtils->generate_qcm($qcm);
        return $this->qcmUtils->create_qcm_file_to_send('file.pdf', $content);
    }

    #[Route('/list', name: 'app_list_qcm')]
    public function list_qcm(Utilisateur $user): JsonResponse {
        $qcms = $this->QCMRepository->getQCMsOfUser($user->getId());
        return new JsonResponse($this->qcmUtils->serialize($qcms));
    }

    #[Route('/{id}', name: 'app_save_qcm', methods: ['POST'])]
    public function save_qcm(int $id, Request $request): Response {
        $oldQCM = $this->qcmUtils->getQcm($id);
        $qcm = $this->serializer->deserialize($request->getContent(), QCM::class, 'json');
        foreach ($qcm->getQuestionsArray() as $question) {
            $question->setQCM($oldQCM);
            $this->QuestionRepository->saveQuestion($question);
            foreach ($question->getReponsesArray() as $reponse) {
                $dbQuestion = $this->QuestionRepository->find($question->getId());
                $reponse->setQuestion($dbQuestion);
                $this->ReponseRepository->saveReponse($reponse);
            }
        }
        $oldQCM->setTitre($qcm->getTitre());
        $this->QCMRepository->saveQCM($oldQCM);
        return new Response();
    }
}
