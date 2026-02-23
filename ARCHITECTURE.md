# 🏗️ Architecture de Urban Project (Expliqué Simplement)

## Comment ça Fonctionne ?

Imagine une maison:
1. **L'entrée** = La page d'accueil (index.html.twig)
2. **Les pièces** = Les trois sections (Citoyens, Signalements, Articles)
3. **Les meubles** = Les données (chaque citoyen, signalement, article)
4. **L'électricité** = Le code PHP qui fait fonctionner tout ça

## Les 3 Couches de l'Application

### 1️⃣ Entity (Les Modèles de Données)
**Fichiers:** `src/Entity/Citoyen.php`, `src/Entity/Signalement.php`, `src/Entity/Article.php`

C'est comme les "plans" de ce qu'on veut stocker:

```
Citoyen:
├── id (numéro unique)
├── nom (texte)
└── email (texte)

Signalement:
├── id
├── titre
├── description
└── statut

Article:
├── id
├── titre
└── contenu
```

### 2️⃣ Repository (Comment Accéder aux Données)
**Fichiers:** `src/Repository/CitoyenRepository.php`, etc.

C'est comme une "bibliothèque" où tu peux chercher des données:
- `findAll()` = Trouve tous les citoyens
- `find($id)` = Trouve un citoyen par ID

### 3️⃣ Controller (La Logique)
**Fichiers:** `src/Controller/CitoyenController.php`, etc.

C'est le "cerveau" du site. Il décide:
- Quelles données afficher
- Comment les afficher
- Comment les modifier

Exemple: Quand tu cliques sur "Ajouter un citoyen":
1. Le Controller demande au Repository une nouvelle Citoyen
2. Il enregistre les données
3. Il retourne à la liste

## Le Flux d'une Demande

### Quand tu vas sur http://127.0.0.1:8000/citoyens/

```
1. Tu cliques sur le lien
     ↓
2. Symfony trouve la route "/citoyens/"
     ↓
3. Symfony exécute CitoyenController::list()
     ↓
4. Le Controller demande le Repository: "Donne-moi tous les citoyens"
     ↓
5. Le Repository cherche dans la base de données
     ↓
6. Le Repository retourne la liste
     ↓
7. Le Controller passe la liste au template
     ↓
8. Le template (list.html.twig) affiche les citoyens dans un tableau
     ↓
9. Le navigateur affiche la page
```

## Exemple Complet: Créer un Citoyen

### Étape 1: Cliquer sur "Créer un citoyen"
```
http://127.0.0.1:8000/citoyens/nouveau → Affiche le formulaire
```

### Étape 2: Remplir le formulaire
```
Nom: Jean
Email: jean@example.com
Bouton: Créer
```

### Étape 3: Envoyer le formulaire
```
POST vers: http://127.0.0.1:8000/citoyens/nouveau

1. CitoyenController::new() reçoit la demande POST
2. Il crée un nouvel objet Citoyen
3. Il remplit les propriétés (nom, email)
4. Il demande à EntityManager de sauvegarder
5. EntityManager sauvegarde dans la base de données
6. Le Controller redirige vers /citoyens/
7. Tu vois Jean dans la liste!
```

## La Base de Données

**Fichier:** `var/data_dev.db`

C'est une base de données SQLite (un fichier, pas besoin d'installer rien).

### Tables:
```
┌─────────────────────────┐
│      citoyen            │
├─────────────────────────┤
│ id      | nom    | email│
├─────────────────────────┤
│ 1       | Jean   | j@ex │
│ 2       | Marie  | m@ex │
└─────────────────────────┘

┌──────────────────────────────────────────┐
│          signalement                     │
├──────────────────────────────────────────┤
│ id | titre        | description | statut │
├──────────────────────────────────────────┤
│ 1  | Nid-de-poule | ...        | nouveau│
└──────────────────────────────────────────┘

┌──────────────────────────────┐
│       article                │
├──────────────────────────────┤
│ id | titre     | contenu      │
├──────────────────────────────┤
│ 1  | Nouvelle  | La route...  │
└──────────────────────────────┘
```

## Les Routes (Les Chemins du Site)

### Citoyens:
- `/` ou `/citoyens/` → Liste tous les citoyens
- `/citoyens/nouveau` → Formulaire pour créer
- `/citoyens/{id}/edit` → Formulaire pour modifier

### Signalements:
- `/signalements/` → Liste tous les signalements
- `/signalements/nouveau` → Formulaire pour créer
- `/signalements/{id}/edit` → Formulaire pour modifier

### Articles:
- `/articles/` → Liste tous les articles
- `/articles/nouveau` → Formulaire pour créer
- `/articles/{id}/edit` → Formulaire pour modifier

## Les Templates (Les Pages HTML)

```
templates/
├── base.html.twig           ← Template de base (header, footer)
├── index.html.twig          ← Page d'accueil
├── citoyen/
│   ├── list.html.twig       ← Liste des citoyens
│   ├── new.html.twig        ← Formulaire créer
│   └── edit.html.twig       ← Formulaire modifier
├── signalement/
│   ├── list.html.twig
│   ├── new.html.twig
│   └── edit.html.twig
└── article/
    ├── list.html.twig
    ├── new.html.twig
    └── edit.html.twig
```

Tous les templates héritent de `base.html.twig` qui contient:
- Le design commun (header, footer)
- Le style CSS
- La navigation

## Comment Ajouter une Nouvelle Propriété ?

Si tu veux ajouter "téléphone" au Citoyen:

### 1. Modifier l'Entity
```php
// src/Entity/Citoyen.php
private ?string $telephone = null;

public function getTelephone(): ?string { return $this->telephone; }
public function setTelephone(?string $telephone): self { $this->telephone = $telephone; return $this; }
```

### 2. Mettre à jour la base de données
```bash
symfony console doctrine:migrations:diff
symfony console doctrine:migrations:migrate
```

### 3. Modifier le Controller
```php
// src/Controller/CitoyenController.php
$citoyen->setTelephone($request->request->get('telephone'));
```

### 4. Modifier les Templates
```twig
{# new.html.twig et edit.html.twig #}
<label>Téléphone:</label>
<input type="tel" name="telephone">
```

```twig
{# list.html.twig #}
<th>Téléphone</th>
<td>{{ citoyen.telephone }}</td>
```

## Résumé

```
Utilisateur clique
    ↓
Route reçoit la demande
    ↓
Controller exécute la logique
    ↓
Repository cherche/modifie les données
    ↓
Base de données stocke/retourne
    ↓
Controller passe au Template
    ↓
Template affiche
    ↓
Navigateur affiche
```

C'est tout! 🎉
