 function prepareEdit(id, name, course, email, phone) {
        document.querySelector('input[name="IDNO"]').value = id;
        document.querySelector('input[name="IDNO"]').readOnly = true;//di pwede palitan
        document.querySelector('input[name="NAME"]').value = name;
        document.querySelector('input[name="COURSE"]').value = course;
        document.querySelector('input[name="EMAIL"]').value = email;
        document.querySelector('input[name="PHONE"]').value = phone;

        document.querySelector('.user-form').action = 'update.php';

        const btn = document.querySelector('button[type="submit"]');
        btn.innerText = "SAVE";
        btn.name = "update";
        btn.className = "newSave";

    }

    function reloadPage(){

        const btn = document.querySelector('button[type="submit"]');
         
        if(btn.name == "update"){
            if(confirm("Reloading the form will cause your progress to lose. Do you wish to continue?")){
             document.querySelector('.user-form').reset();

              document.querySelector('.user-form').action = 'add.php';


              const btn = document.querySelector('button[type="submit"]');
              btn.innerText = "Add User";
              btn.name = "add";
              btn.className = "addBtn";

            }

        } else {
            document.querySelector('.user-form').reset();
        }

    }



    //<script src="js/userService.js"></script>
    //<script src="js/app.js"></script>