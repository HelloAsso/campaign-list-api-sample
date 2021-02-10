Page web permettant l'affichage des widgets de campagnes d'une association de façon dynamique.

C'est-à-dire que la récupération des campagnes se fait au travers de l'[API HelloAsso](https://dev.helloasso.com) et non par une intégration statique d'iframe.

# Configuration
Il est nécessaire de récupérer votre clé API dans l'administration de votre association.

Onglet : Mon compte / API et intégrations

Il vous faudra également le nom de votre association tel qu'il apparait dans les urls HelloAsso.
Prenons le cas des [restos du coeur](https://www.helloasso.com/associations/les-restos-du-coeur-siege-national), l'url de l'association est celle-ci `https://www.helloasso.com/associations/les-restos-du-coeur-siege-national`
le nom de l'association au format url est donc `les-restos-du-coeur-siege-national`

Il faut ensuite éditer le fichier de configuration `Config.php` pour le personnaliser avec vos valeurs.
```
public $clientId = "[VOTRE_CLIENT_ID]";
public $clientSecret = "[VOTRE_CLIENT_SECRET]";
public $organismUrl = "[NOM_ASSOCIATION_FORMAT_URL]";
```

# Déploiement
Ce site nécessite d'avoir un environnement PHP ainsi que [composer](https://getcomposer.org/) pour gérer les dépendances.

Avant de tester ou déployer ce site, il faut donc récupérer les dépendances:

`composer install`

Pour tester en local il est possible d'utiliser [Visual Studio Code](https://code.visualstudio.com/) et l'extension [PHP Server](https://marketplace.visualstudio.com/items?itemName=brapifra.phpserver)

Pour une utilisation en production, il suffit de copier l'intégralité du dossier sur votre serveur