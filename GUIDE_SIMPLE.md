# 📋 Urban Project - Guide Simple pour Débutants

Bienvenue dans Urban Project ! C'est une application **très simple** pour gérer trois choses:
1. **Citoyens** - Les personnes dans la ville
2. **Signalements** - Les problèmes signalés par les citoyens
3. **Articles** - Les actualités ou nouvelles

## 🚀 Comment Démarrer le Serveur

```bash
symfony serve
```

Puis ouvre ton navigateur et va à: **http://127.0.0.1:8000**

## 📚 Les Trois Sections Principales

### 1️⃣ Citoyens (`/citoyens/`)
C'est pour ajouter les personnes qui vivent en ville.

**Propriétés d'un Citoyen:**
- **ID** - Numéro unique (automatique)
- **Nom** - Le nom du citoyen
- **Email** - L'adresse email

**Actions possibles:**
- 📝 Ajouter un nouveau citoyen
- ✏️ Modifier les informations d'un citoyen
- 🗑️ Supprimer un citoyen

### 2️⃣ Signalements (`/signalements/`)
C'est pour signaler les problèmes en ville (nid-de-poule, éclairage cassé, etc.)

**Propriétés d'un Signalement:**
- **ID** - Numéro unique (automatique)
- **Titre** - Nom du problème
- **Description** - Explication du problème
- **Statut** - État du problème (nouveau, en cours, résolu)

**Actions possibles:**
- 📝 Créer un nouveau signalement
- ✏️ Modifier un signalement existant
- 🗑️ Supprimer un signalement

### 3️⃣ Articles (`/articles/`)
C'est pour publier des actualités ou des nouvelles.

**Propriétés d'un Article:**
- **ID** - Numéro unique (automatique)
- **Titre** - Le titre de l'actualité
- **Contenu** - Le texte de l'actualité

**Actions possibles:**
- 📝 Créer un nouvel article
- ✏️ Modifier un article
- 🗑️ Supprimer un article

## 🗄️ La Base de Données

Les données sont stockées dans un fichier SQLite: **var/data_dev.db**

Il y a 3 tables:
1. **citoyen** - Les citoyens
2. **signalement** - Les signalements
3. **article** - Les articles

## 📝 Exemple d'Utilisation

1. Va à **http://127.0.0.1:8000**
2. Clique sur "Citoyens"
3. Clique sur "Créer un citoyen"
4. Remplis le formulaire:
   - Nom: "Jean Martin"
   - Email: "jean@example.com"
5. Clique sur "Créer"
6. Le citoyen apparaît dans la liste!

## ❓ Questions Fréquentes

**Q: Où sont stockées les données?**
R: Dans le fichier `var/data_dev.db` (une base de données SQLite)

**Q: Comment ajouter un nouveau citoyen?**
R: Va sur /citoyens/ et clique sur "Créer un citoyen"

**Q: Comment modifier un citoyen?**
R: Va sur /citoyens/, trouve le citoyen dans la liste et clique sur "Modifier"

**Q: Comment supprimer un citoyen?**
R: Va sur /citoyens/, trouve le citoyen et clique sur "Supprimer" (attention: ça efface les données!)

## 🛠️ Structure du Projet

```
urban-project/
├── src/
│   ├── Entity/           <- Les modèles de données
│   │   ├── Citoyen.php
│   │   ├── Signalement.php
│   │   └── Article.php
│   ├── Controller/       <- La logique des pages
│   │   ├── CitoyenController.php
│   │   ├── SignalementController.php
│   │   ├── ArticleController.php
│   │   └── HomeController.php
│   └── Repository/       <- Pour accéder à la base de données
│       ├── CitoyenRepository.php
│       ├── SignalementRepository.php
│       └── ArticleRepository.php
├── templates/            <- Les pages HTML
│   ├── base.html.twig
│   ├── index.html.twig
│   ├── citoyen/
│   ├── signalement/
│   └── article/
└── var/
    └── data_dev.db       <- La base de données
```

## 🎓 Apprentissage

Cette application utilise:
- **Symfony** - Un framework PHP
- **Doctrine** - Pour communiquer avec la base de données
- **Twig** - Pour créer les pages HTML

Tout est très simple pour que tu puisses apprendre comment ça fonctionne!

## 📞 Besoin d'Aide?

Les trois sections principales sont sous:
- `/citoyens/`
- `/signalements/`
- `/articles/`

À bientôt! 🎉
