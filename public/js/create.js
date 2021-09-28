
//READ 
//creation de tr puis td DOM jquery dans le tbody
function readStudent(){
    //jqajax et methode GET
    $.ajax({
        type: "GET",
        url: "/readStudents",
        dataType: "json",
        success: function (response) {
            $('tbody').html("");
            //response.students contient toutes les données de notre table, il renvoit in array d'objets vu que cest du json. Voir controller fonction readStudents
            console.log('Dans ma base de données: ',response.students);

            //On va faire une boucle dessus pour creer un <tr> dans  <td> dans le <tbody> jqeach
            //Ceci est ecrit de cette maniere particulière pour que tout rentre dans les cases adéquates
            //la value des boutons doit etre egal à l'element.id !
            $.each(response.students, function (indexInArray, element) { 
                $('tbody').append('<tr>\
                    <td>' + element.id + '</td>\
                    <td>' + element.name + '</td>\
                    <td>' + element.email + '</td>\
                    <td>' + element.course + '</td>\
                    <td>' + element.phone + '</td>\
                    <td><button type="button" value="' + element.id + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                    <td><button type="button" value="' + element.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                    </tr>'
                );
            });
        }
    });

}

readStudent()




//Equivalent en DOM
// let save= document.getElementsByClassName('add_student')[0];
// save.addEventListener('click', function(e) {
//     e.preventDefault();
//     console.log('Hello');
// })

// jqon.
//add_student cest la classe du bouton save du addModal
$('.add_student').on('click', function (e) {
        //Empeche le rafraichissemet au submit
        e.preventDefault();
        
        //On crée un objet qui reprend les valeurs des inputs
        //jqvalget
        //The .val() method is primarily used to get the values of form elements such as input, select and textarea.
        //Les Données envoyées doivent Toujours être sous forme d'objet
        let data={
            'name': $('.name').val(),
            'email': $('.email').val(),
            'course': $('.course').val(),
            'phone': $('.phone').val(),
        }
        //console.log(data.name);


        //AJAX CRUD jqAjax
        //CREATE donc method POST
        //Visiter Laravel doc sercion ajax X-CSRF-TOKEN
        //mettre le csrf: <meta name="csrf-token" content="{{ csrf_token() }}"> Dans le index.blade.php
        //Mettre le lignes ajax header ici:

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            //uri POST du web
            url: "/students",
            //Quelle donnée on envoie ?
            data: data,
            //On envoie toujours en json
            dataType: "json",
            //Quand l'envoi est reussi
            success: function (response) {
                console.log(response);
                
                //Etape d'affichage des messages d'erreur de validation en haut du form. Voir aussi controller
                //400 car c'est ce qu'on a specifié dans le controller
                //S'il y a des inputs non remplis
                if (response.status==400) {
                    //on va faire une boucle pour tous les erreurs et les afficher .jqeach
                    $.each(response.errors, function (key, element) { 
                        //Pour chaque erreur on va creer des li
                        //il sera dans le <ul id='#save_msgList'>  vide en haut du addModal
                        $('#save_msgList').append('<li class="alert alert-danger">'+element+'</li>');
                    });
                    //Quand tous les inputs sont remplis 
                    //success_message est dans le studentIndex
                }else{
                    //on rajoute le texte écrit dans le controller

                    $('.success_message').addClass('alert alert-success');
                    $('.success_message').text(response.message);
                    //on cache/ferme le modal. Lui dire que c'est un modal pour qu'il enlève aussi le gris
                    $('#AddStudentModal').modal('hide');

                    //lance la fonction tout en haut
                    readStudent()
                }
            }
        });
    
});



