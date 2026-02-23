# 🧪 Tests de l'Application Urban Project

## Checklist de Vérification

Voici les étapes pour vérifier que tout fonctionne correctement:

### ✅ Test 1: Page d'Accueil
- [ ] Ouvre http://127.0.0.1:8000
- [ ] Vérifies que tu vois "Bienvenue sur Urban Project"
- [ ] Vérifies qu'il y a 3 liens (Citoyens, Signalements, Articles)
- [ ] Clique sur chacun des liens et vérifies qu'ils chargent les pages

### ✅ Test 2: Ajouter un Citoyen
1. Va à http://127.0.0.1:8000/citoyens/
2. Clique sur "Créer un citoyen"
3. Remplis le formulaire:
   - Nom: "John Doe"
   - Email: "john@example.com"
4. Clique sur "Ajouter"
5. [ ] Vérifies que tu reviens à la liste
6. [ ] Vérifies que "John Doe" apparaît dans le tableau

### ✅ Test 3: Modifier un Citoyen
1. Va à http://127.0.0.1:8000/citoyens/
2. Trouve "John Doe" dans la liste
3. Clique sur "Modifier"
4. Change le nom à "Jane Doe"
5. Clique sur "Envoyer"
6. [ ] Vérifies que le nom a été modifié dans la liste

### ✅ Test 4: Ajouter un Signalement
1. Va à http://127.0.0.1:8000/signalements/
2. Clique sur "Créer un signalement"
3. Remplis le formulaire:
   - Titre: "Nid-de-poule rue du Parc"
   - Description: "Il y a un grand nid-de-poule devant l'école"
   - Statut: "nouveau"
4. Clique sur "Créer"
5. [ ] Vérifies que le signalement apparaît dans la liste avec le statut "nouveau"

### ✅ Test 5: Ajouter un Article
1. Va à http://127.0.0.1:8000/articles/
2. Clique sur "Créer un article"
3. Remplis le formulaire:
   - Titre: "Nouvelle route en construction"
   - Contenu: "La route principale sera fermée pour les réparations."
4. Clique sur "Créer"
5. [ ] Vérifies que l'article apparaît dans la liste

### ✅ Test 6: Supprimer un Citoyen
1. Va à http://127.0.0.1:8000/citoyens/
2. Clique sur "Supprimer" pour "Jane Doe"
3. Confirme le message de suppression
4. [ ] Vérifies que "Jane Doe" n'apparaît plus dans la liste

### ✅ Test 7: Navigation
1. [ ] Clique sur "Accueil" dans le header
2. [ ] Clique sur "Citoyens" dans le header
3. [ ] Clique sur "Signalements" dans le header
4. [ ] Clique sur "Articles" dans le header
5. [ ] Vérifies que tout fonctionne sans erreur

### ✅ Test 8: Vérifier les Erreurs
- [ ] Ouvre les outils du développeur (F12) dans ton navigateur
- [ ] Clique sur "Console"
- [ ] Vérifies qu'il n'y a pas d'erreurs JavaScript
- [ ] Vérifies qu'il n'y a pas de messages d'erreur

## Résultats

Si tous les tests passent ✅, alors l'application fonctionne correctement!

## Problèmes Courants

**Q: J'ai une erreur 404**
R: Vérifies que l'URL est correcte. Les trois sections sont:
- /citoyens/
- /signalements/
- /articles/

**Q: Le formulaire ne fonctionne pas**
R: Vérifies que tous les champs ne sont pas vides et que le bouton est cliqué.

**Q: Les données ne sont pas sauvegardées**
R: Vérifies que la base de données existe: var/data_dev.db

**Q: Le serveur affiche une erreur**
R: Regarde le terminal où tu as lancé `symfony serve` pour voir l'erreur complète.

## Notes

- La base de données est dans: **var/data_dev.db**
- Les données sont persistées même après l'arrêt du serveur
- Pour supprimer toutes les données, tu peux effacer le fichier var/data_dev.db et redémarrer le serveur

Bonne chance! 🎉
