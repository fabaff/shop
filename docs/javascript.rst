.. 

Javascript
==========
Over the years Javascript became a very popular programming language. The 
webshop is using Javascript at a couple of places.

Simple use case
---------------
Javascript makes it easy to access elements in the DOM. Setting the focus is a 
nice way to support the user with input form :: 

        <script language="javascript">
            function setFocus() {
                document.forms["login"]["username"].focus();
            }
        </script>
    </head>
    <body onload="setFocus()">

Another one is to check if something was entered in an input field.

    function validateForm() {
        var username = document.forms["login"]["username"].value;
        if (username == null || username == "") {
            document.forms["login"]["username"].style.backgroundColor = "#FF9999";
            document.forms["login"]["username"].placeholder = "Please, your username!";
            document.forms["login"]["username"].focus();
            return false;
        }
        ...

A simple message is informing the user about an action which was taken against
the database. ::

    echo "<script type=\"text/javascript\">
              alert(\"New entry $entry added successfully.\");
              window.location = \"../tables.php\"
          </script>";

The delete process is only executed if the user confirm to delete a record. ::

    <form action="scripts/delete-process.php" onSubmit="return confirm('Are you sure to delete this entry?');" method="POST">
        <input type="hidden" name="table" value="$section"/>
        <input type="hidden" name="id" value="$result->id\"/>
        <input type="submit" name="Submit" value="Delete">
    </form>

For additional Javascript please check the source of the ``index.php`` file and
the :ref:`webservice`_ section.
