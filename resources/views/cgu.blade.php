<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="{{ asset('css/cgu.css') }}" />
      <title>CGU - MyBook</title>
   </head>
   <body>
      <div id="bloc">
         <header>
            <div id="first_title">
               <div id="logo">
                  <img src="{{ asset('image/butter.png') }}" alt="ButterCorp" />
                  <h1>CGU</h1>
                  <br>
                  <h2>MyBook</h2>
               </div>

            </div>
            
         </header>
      
         <section>
            <article>
            <h3>Politique d’utilisation des données</h3>
            <p>
               MyBook est une plateforme qui donne la possibilité à un utilisateur inscrit d'importer ses données depuis facebook et ainsi augmenter sa visiblité sur
               la toile en créant un site vitrine.
            </p>
            <p>
               La présente politique indique le type de données que nous recueillons, l’utilisation que nous en faisons et la façon dont nous les partageons.
            </p>
            <h3>Quels types d’informations recueillons-nous ? </h3>
            <p>
               Nous recueillons les informations suivantes:
            </p>
            <ul>
               <li>Le prénom</li>
               <li>Le nom</li>
               <li>L'email</li>
               <li>L'url des photos sélectionnées sur la page d'import des photos</li>
               <li>Le nombre de likes et de commentaires des photos séléectionnées ainsi que leurs descriptions</li>
            </ul>
            <h3>Comment utilisons-nous ces informations ? </h3>
            <p>
               MyBook à vocation de créer facilement un site vitrine à un utilisateur en important ses photos de facebook.
               <br>
               MyBook stock seulement les URL des photos sélectionnées, mais ne stock pas la photo en elle-même.
               <br>
               Le prénom, le nom et l'e-mail de l'utilisateur seront enregistré et modifiable et pourrons être exploité pour contacter l'utilisateur.
            </p>
            <h3>Comment ces informations sont-elles partagées ? </h3>
            <p>
               Les informations récupérées sur l'utilisateur seront stockés, l'affichage de ces données seront le choix exclusif de l'utilisateur.
               <br>
               Aucune information ne sera partagé, ou revendue
            </p>
            <h3>Comment puis-je gérer ou supprimer les informations me concernant ? </h3>
            <p>
               MyBook donne la possibilité à l'utilisateur de modifier ses informations personnelles ainsi que les photos importées. Il est possible à tout moment
               de retirer son site vitrine d'internet en le passant en mode "maintenance"
               <br>
               La suppression d'une donnée est irrécupérable, MyBook n'effectue pas de sauvegarde des données. La suppression d'un élément est définitive
            </p>
            </article>
            <aside>
            <h3>Comment adresser vos questions à MyBook ?</h3>
            <p id="butter"><img src="{{ asset('image/butter.png') }}"></p>
            <p>
               Vous avez la possibilité de nous contacter par mail à <a href="mailto:butter.brxtn@gmail.com"> l'adresse suivante </a>
               <br>
               Nous vous garantissons une réponse sous 24h.
            </p>
            </aside>
         </section>
         <footer><p>©Copyright 2018 ButterCorp All Rights Reserved</p></footer>
      </div>
   </body>
</html>