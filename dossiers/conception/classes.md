# QCM
- Titre: string
- DateCreation: Date (De création dans la bd)
- DateUpdate: Date (Dernière update dans la bd)
- PaperSize: ENUM (Voir 4.2)
- Presentation: string
- ShuffleQuestions: boolean
- Columns: int
- CompleteMulti: boolean (permet d'ajouter une case "Aucune réponse correcte)
- SeparateAnwserSheet: boolean
- Questions : Question[]

# Question
- Titre: string
- Enonce: string
- Type: QuestionType
- Verbatim: string? (Utile pour les morceaux de code)
- Image: Image?
- Responses: Reponse[]

# Reponse
- estCorrect: boolean
- texte: string

# QuestionType (enum)
- SIMPLE
- MULTIPLE
- OUVERTE (Voir la doc pour les options à mettre)

# Options des questions
- horizontale: boolean
- columns: int
- ordered: boolean
- indicative: boolean
- next: boolean
- first: boolean
- last: boolean
- pointsBon: float
- pointsMauvais: float
// Peut-être d'autres mais pas les plus importants

# Image
- path: string
- options... // A faire

# Groupe
- Titre: string
- suffle: boolean
- columns: int
- numquestions: int
- needspace: int (assumé en cm)
