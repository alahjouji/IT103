Fonctionnalit�s
---------------

impl�ment�es:
- Inscription d'un utilisateur au serveur
- Authentification d'un utilisateur
- D�connexion d'un utilisateur
- Ajout ou �dition d'une question
- Ajout, �dition ou supression d'une r�ponse
- Vote pour une seule des r�ponses d'une question
- Changement de vote pour une autre r�ponse
- Affichage de la liste des questions sans r�ponse sur la page d'accueil
- Affichage de la liste des questions de l'utilisateur connect� sur la page d'accueil
- Affichage de la liste de toutes les questions
- Voir une question associ� � toutes ses r�ponses 

non impl�ment�es: RAS



Architecture
------------

src/config.php :

	Fichier contenant les variables globales de configuration de la base de donn�es et du site.

src/functions.php :

	Fichier contenant toutes les fonctions utilis�es dans le code php des autres fichiers.

src/install.php :

	Fichier permettant de:
	 cr�er les tables r�ponses, questions, utilisateurs et votes.
	 cr�er 2 utilisateurs (max@max.max/ Max/ max) et (bob@bob.bob/ Bob/ bob).
	 cr�er une question de Max Hello? et une r�ponse de Bob Hello! � cette question.
	 ajouter un vote de Max pour la r�ponse de Bob.
		

src/index.php :
	
	Ce fichier permet � un utilisateur de s'authentifier s'il fournit une adresse mail et un mot de passe existants dans la base de donn�es. 
	La saisie du mail et du pseudo doit respecter les contraintes suivantes: mail dans un format valide et aucun champ vide. 
	Des messages d'erreurs s'affichent dans le cas �ch�ant.
	Si un utilisateur est d�j� connect� ou arrive � se connecter ce fichier renvoit directement � la page d'accueil.
        Ce fichier contient aussi un lien vers le formulaire d'inscription.

src/back_inscription_form.php :

	ce fichier permet � un nouvel utilisateur de s'inscrire sur le serveur s'il remplis tous les champs, avec un mail et un pseudo qui n'existent pas d�j� 
        dans la base de donn�es et s'il retape le m�me mot de passe correctement.
	Dans le cas d'un champ vide ou d'une consigne non respect�e, un message d'erreur est affich�.

src/home.php :

	Ce fichier repr�sente la page d'accueil affich� pour un utilisateur authentifi�.
	Il permet � ce dernier de voir la liste des d�rni�res questions sans r�ponse et la liste de ses propres questions.
	Il peut aussi acc�der au r�ponses de chaque question en cliquant dessus.
	Il contient aussi une barre avec des liens pour poser une nouvelle question, Voir la liste de toutes les questions ou se d�connecter.

src/back_questions.php :

	Ce fichier permet � un utilisateur authentifi� de voir la liste de toutes les questions.
	Il peut aussi acc�der aux r�ponses de chaque question en cliquent dessus.

src/back_questions_form.php :

	Ce fichier permet � tout utilisateur authentifi� de poser une nouvelle question ou d'�diter une question qui existe d�j� si c'est lui qui l'avait pos�.
	En cas d'�dition toutes les r�ponses d�j� associ� seront supprim�s.

src/back_reponses.php :

	Ce fichier permet � un utilisateur authentifi� de voir une question et toutes ses r�ponses.
	Si c'est lui qui avait pos� la question il trouvera un lien pour l'�diter.
	Il peut aussi voir le nombre de votes pour chaque r�ponse, ainsi si c'est sa r�ponse deux liens d'�dition et de supression s'afficheront � c�t� d'elle 
        sinon un lien de vote sera affich�.
	En cas de supression d'une r�ponse tous les votes associ�s seront supprim�s aussi.
	
src/back_reponses_form.php :
	
	Ce fichier permet � tout utilisateur authentifi� de donner une nouvelle r�ponse � une question ou d'�diter une r�ponse qui existe d�j� si c'est lui qui 
        l'avait donn�.
	En cas d'�dition toutes les votes d�j� associ� seront supprim�s et l'utilisateur est renvoy� � la question associ�.

src/back_votes.php :

	Ce fichier permet � un utilisateur d'ajouter un vote � une r�ponse. 
	Si il a d�j� vot� pour cette r�ponse un message d'erreur est affich�.
	si il a d�j� vot� pour une autre r�ponse de la m�me question il se voit propos� un choix entre garder son vote pour l'autre r�ponse ou le modifier et 
	voter pour celle-ci.

src/back_votes_edit.php :

	Si un utilisateur d�sire de changer son vote pour une autre question ce fichier permet de supprimer son vote de la table des votes, d�cr�menter le nombre
        de votes de la premi�re r�ponse, ajouter un nouveau vote et incr�menter le nombre de votes de la deuxi�me r�ponse.

src/bootstrap.css
src/signin.css
src/offcanvas.css     
src/grid.css

	4 fichiers css de la librairie bootstrap pour introduire du code css avanc� et mettre en forme le site.




