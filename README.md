# 🏙️ Urban Project

![Symfony](https://img.shields.io/badge/Symfony-7.4-black?style=flat-square&logo=symfony)
![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=flat-square&logo=php)
![SQLite](https://img.shields.io/badge/Database-SQLite-003B57?style=flat-square&logo=sqlite)
![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)

Une application web **simple et minimaliste** pour gérer les citoyens, les signalements et les articles d'une ville. 

**⭐ Parfait pour apprendre Symfony, Doctrine et Twig.**

## 📋 Table des Matières

- [Caractéristiques](#-caractéristiques)
- [Prérequis](#-prérequis)
- [Installation](#-installation)
- [Utilisation](#-utilisation)
- [Documentation](#-documentation)
- [Récapitulatif](#-récapitulatif)
- [Structure](#-structure)
- [Routes API](#-routes-api)
- [Stack Technologique](#-stack-technologique)
- [FAQ](#-faq)
- [License](#-license)

---

## ✨ Caractéristiques

✅ **Application web complète et fonctionnelle**
- Gestion CRUD (Create, Read, Update, Delete) pour 3 ressources
- Base de données SQLite persistante
- Interface web propre et intuitive

✅ **Code minimaliste et éducatif**
- Idéal pour les débutants
- Zéro complexity inutile
- Bien documenté et expliqué

✅ **Architecture professionnelle**
- Framework Symfony 7.4
- ORM Doctrine
- Template engine Twig
- Routes bien organisées

✅ **Documentation complète incluse**
- Guide d'utilisation pour les utilisateurs
- Explications de l'architecture pour les développeurs
- Checklist de test
- Guide de démarrage rapide

## 📋 Prérequis

Avant de commencer, assure-toi que tu as:

- **PHP 8.2** ou supérieur
- **Composer** (gestionnaire de dépendances PHP)
- **Symfony CLI** (optionnel mais recommandé)
- **Git** (pour cloner le projet)

### Vérifier les prérequis

```bash
# Vérifier les versions installées
php --version
composer --version
symfony -v
git --version
```

## 🚀 Installation

### 1️⃣ Cloner le projet

```bash
git clone https://github.com/josephbriones/urban-project.git
cd urban-project
```

### 2️⃣ Installer les dépendances

```bash
composer install
```

### 3️⃣ Créer la base de données

```bash
php bin/console doctrine:schema:create
```

### 4️⃣ Démarrer le serveur

```bash
symfony serve
```

Le serveur démarre sur: **http://127.0.0.1:8000**

### 5️⃣ Arrêter le serveur

```bash
symfony server:stop
```

## 💻 Utilisation

### Accéder aux sections

Une fois le serveur démarré, visite:

- **Accueil:** http://127.0.0.1:8000
- **Citoyens:** http://127.0.0.1:8000/citoyens/
- **Signalements:** http://127.0.0.1:8000/signalements/
- **Articles:** http://127.0.0.1:8000/articles/

### Exemple d'utilisation simple

1. Va sur **Citoyens**
2. Clique sur **"Créer un citoyen"**
3. Remplis le formulaire:
   - Nom: `Jean Martin`
   - Email: `jean@example.com`
4. Clique sur **"Ajouter"**
5. Jean Martin apparaît dans la liste! ✅

## 📖 Documentation

| Document | Description |
|----------|-------------|
| [GUIDE_SIMPLE.md](GUIDE_SIMPLE.md) | Guide complet d'utilisation |
| [ARCHITECTURE.md](ARCHITECTURE.md) | Explication technique (Entity, Controller, Repository) |
| [TESTS.md](TESTS.md) | Checklist de test |
| [QUICKSTART.txt](QUICKSTART.txt) | Démarrage ultra-rapide |

---

## 📊 Récapitulatif

### 👥 Gestion des Citoyens (`/citoyens/`)

Gérer les personnes vivant en ville.

**Opérations:**
- ✅ Voir tous les citoyens
- ✅ Créer un nouveau citoyen
- ✅ Modifier un citoyen
- ✅ Supprimer un citoyen

**Propriétés:**
| Propriété | Type | Description |
|-----------|------|-------------|
| `id` | Integer | Identifiant unique (auto-généré) |
| `nom` | String | Nom du citoyen |
| `email` | String | Adresse email |

### 📋 Gestion des Signalements (`/signalements/`)

Signaler des problèmes en ville (nids-de-poule, éclairage cassé, etc.)

**Opérations:**
- ✅ Voir tous les signalements
- ✅ Créer un signalement
- ✅ Modifier un signalement
- ✅ Supprimer un signalement
- ✅ Changer le statut

**Propriétés:**
| Propriété | Type | Description |
|-----------|------|-------------|
| `id` | Integer | Identifiant unique (auto-généré) |
| `titre` | String | Titre du problème |
| `description` | Text | Description détaillée |
| `statut` | String | État: `nouveau`, `en cours`, ou `résolu` |

### 📰 Gestion des Articles (`/articles/`)

Publier des actualités et nouvelles.

**Opérations:**
- ✅ Voir tous les articles
- ✅ Créer un article
- ✅ Modifier un article
- ✅ Supprimer un article

**Propriétés:**
| Propriété | Type | Description |
|-----------|------|-------------|
| `id` | Integer | Identifiant unique (auto-généré) |
| `titre` | String | Titre de l'article |
| `contenu` | Text | Contenu de l'article |

---

## 📁 Structure

```
urban-project/
├── src/
│   ├── Entity/                    # Modèles de données
│   │   ├── Citoyen.php
│   │   ├── Signalement.php
│   │   └── Article.php
│   ├── Controller/                # Logique de l'application
│   │   ├── HomeController.php
│   │   ├── CitoyenController.php
│   │   ├── SignalementController.php
│   │   └── ArticleController.php
│   ├── Repository/                # Accès à la base de données
│   │   ├── CitoyenRepository.php
│   │   ├── SignalementRepository.php
│   │   └── ArticleRepository.php
│   └── Kernel.php                 # Configuration Symfony
│
├── templates/                     # Pages HTML (Twig)
│   ├── base.html.twig             # Layout de base
│   ├── index.html.twig            # Page d'accueil
│   ├── citoyen/
│   │   ├── list.html.twig
│   │   ├── new.html.twig
│   │   └── edit.html.twig
│   ├── signalement/
│   │   ├── list.html.twig
│   │   ├── new.html.twig
│   │   └── edit.html.twig
│   └── article/
│       ├── list.html.twig
│       ├── new.html.twig
│       └── edit.html.twig
│
├── var/
│   └── data_dev.db                # Base de données SQLite
│   └── cache/                     # Cache Twig
│
├── config/
│   ├── packages/                  # Configuration des bundles
│   ├── routes.yaml                # Routes de l'application
│   └── services.yaml              # Services Symfony
│
├── public/
│   └── index.php                  # Point d'entrée de l'application
│
├── composer.json                  # Dépendances PHP
├── composer.lock                  # Lock file
├── symfony.lock                   # Lock file Symfony
│
├── README.md                      # Ce fichier
├── GUIDE_SIMPLE.md                # Guide d'utilisation
├── ARCHITECTURE.md                # Explications techniques
├── TESTS.md                       # Checklist de test
└── QUICKSTART.txt                 # Démarrage rapide
```

---

## 🔗 Routes API

### Routes des Citoyens

| Route | Méthode | Description |
|-------|---------|-------------|
| `/citoyens/` | GET | Liste tous les citoyens |
| `/citoyens/nouveau` | GET | Affiche le formulaire de création |
| `/citoyens/nouveau` | POST | Crée un nouveau citoyen |
| `/citoyens/{id}/edit` | GET | Affiche le formulaire de modification |
| `/citoyens/{id}/edit` | POST | Met à jour le citoyen |
| `/citoyens/{id}/delete` | POST | Supprime le citoyen |

### Routes des Signalements

| Route | Méthode | Description |
|-------|---------|-------------|
| `/signalements/` | GET | Liste tous les signalements |
| `/signalements/nouveau` | GET | Affiche le formulaire de création |
| `/signalements/nouveau` | POST | Crée un nouveau signalement |
| `/signalements/{id}/edit` | GET | Affiche le formulaire de modification |
| `/signalements/{id}/edit` | POST | Met à jour le signalement |
| `/signalements/{id}/delete` | POST | Supprime le signalement |

### Routes des Articles

| Route | Méthode | Description |
|-------|---------|-------------|
| `/articles/` | GET | Liste tous les articles |
| `/articles/nouveau` | GET | Affiche le formulaire de création |
| `/articles/nouveau` | POST | Crée un nouvel article |
| `/articles/{id}/edit` | GET | Affiche le formulaire de modification |
| `/articles/{id}/edit` | POST | Met à jour l'article |
| `/articles/{id}/delete` | POST | Supprime l'article |

### Autres Routes

| Route | Méthode | Description |
|-------|---------|-------------|
| `/` | GET | Page d'accueil |

---

## 💾 Base de Données

### Stockage

Les données sont stockées dans un fichier SQLite: **`var/data_dev.db`**

### Avantages

✅ Aucun serveur externe à installer  
✅ Données persistantes  
✅ Facile de réinitialiser (supprimer le fichier)  

### Réinitialiser la base de données

```bash
# 1. Supprimer la base de données actuelle
rm var/data_dev.db

# 2. Recréer la base de données
php bin/console doctrine:schema:create
```

---

## 🛠️ Stack Technologique

### Backend

- **Framework:** [Symfony 7.4](https://symfony.com/)
- **Language:** PHP 8.2+
- **ORM:** [Doctrine 2](https://www.doctrine-project.org/)
- **Database:** SQLite

### Frontend

- **Template Engine:** [Twig](https://twig.symfony.com/)
- **CSS:** CSS3 (Vanilla, sans framework)
- **JavaScript:** Vanilla JavaScript (optionnel)

### Tools

- **Dependency Manager:** [Composer](https://getcomposer.org/)
- **Server:** Symfony CLI Web Server
- **Version Control:** Git

---

## ❓ FAQ

### Q: Comment démarrer?

**R:** Suis les étapes [Installation](#-installation).

### Q: Où sont les données?

**R:** Dans le fichier **`var/data_dev.db`** (une base de données SQLite).

### Q: Comment réinitialiser la base de données?

**R:**
```bash
rm var/data_dev.db
php bin/console doctrine:schema:create
```

### Q: Comment arrêter le serveur?

**R:**
```bash
symfony server:stop
```

Ou appuie sur `CTRL + C` dans le terminal.

### Q: Le serveur affiche une erreur?

**R:** Regarde le terminal pour voir le message d'erreur complet. Tu peux aussi:
```bash
# Nettoyer le cache
php bin/console cache:clear

# Recréer la base de données
php bin/console doctrine:schema:create
```

### Q: Comment ajouter une nouvelle propriété?

**R:** Voir [ARCHITECTURE.md](ARCHITECTURE.md) - Section "Comment Ajouter une Nouvelle Propriété"

### Q: Je veux ajouter plus de fonctionnalités?

**R:** Voici des idées:
- Authentification utilisateur
- Système de commentaires
- Pagination
- Recherche et filtrage
- Validation plus complexe
- Tests automatisés
- API REST
- Interface d'administration

Consulte [ARCHITECTURE.md](ARCHITECTURE.md) pour comprendre la structure!

---

## 🎓 Apprendre avec ce Projet

Ce projet est idéal pour:

1. **Comprendre Symfony** - Framework PHP moderne
2. **Apprendre Doctrine** - ORM pour la base de données
3. **Maîtriser Twig** - Template engine
4. **Pratiquer CRUD** - Create, Read, Update, Delete
5. **Architecture MVC** - Model, View, Controller

**Points clés:**

| Concept | Explication |
|---------|-------------|
| **Entity** | Modèle de données (ex: Citoyen) |
| **Controller** | Logique de l'application |
| **Repository** | Accès à la base de données |
| **Template** | Pages HTML (Twig) |
| **Routes** | Chemins du site (/citoyens/, /articles/, etc.) |

---

## 🚀 Prochaines Étapes

Après avoir maîtrisé ce projet, tu peux:

- ✨ Ajouter une authentification utilisateur
- 🔐 Implémenter un système de permissions
- 📝 Ajouter des validations avancées
- 🧪 Écrire des tests automatisés
- 🌐 Créer une API REST
- 📊 Ajouter un dashboard d'administration
- 🔍 Implémenter la recherche et le filtrage
- 💬 Ajouter un système de commentaires

---

## 📚 Ressources Utiles

- [Documentation Symfony](https://symfony.com/doc/)
- [Documentation Doctrine](https://www.doctrine-project.org/projects/orm.html)
- [Documentation Twig](https://twig.symfony.com/)
- [PHP.net](https://www.php.net/)

---

## 📝 License

Ce projet est sous license MIT. Libre d'utilisation pour tout projet personnel ou commercial.

```
MIT License

Copyright (c) 2026 Joseph Briones

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software...
```

---

## 🤝 Contribution

Les contributions sont bienvenues! Voici comment:

1. **Fork** le projet
2. **Crée une branche** (`git checkout -b feature/AmazingFeature`)
3. **Commit** tes changements (`git commit -m 'Add some AmazingFeature'`)
4. **Push** vers la branche (`git push origin feature/AmazingFeature`)
5. **Ouvre une Pull Request**

---

## ⭐ Support

Si ce projet t'a aidé, n'hésite pas à:

- ⭐ Mettre une star sur GitHub
- 🐛 Rapporter les bugs
- 💬 Partager tes suggestions
- 📢 Parler du projet

---

<div align="center">

**💡 Créé pour les débutants qui veulent apprendre Symfony.**

*Happy coding! 🎉*

</div>
