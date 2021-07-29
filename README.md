Pour l'installer: 
- faire un 'composer install'
- faire un 'doctrine database:create'
- Générer les clés pour l'authentification par token via la commande php bin/console lexik:jwt:generate-keypair
- executer les fichiers de migration
- créer un utilisateur via la commande  api:create-user xxx@gmail mdp
- pour les api, une authentification est nécessaire via /authentication_token
- faire l'upload du fichier de stock via /api/upload 
- pour voir les statistiques de chaque fichier stock via /api/statistique ou /api/statistique/{id_stock}
