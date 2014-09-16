Mailchimp Save script
=====================
To save form's data into Mailchimp and into a database.
I often have to store the form's data of a single php page into mailchimp. It's annoying to do the same thing over and over so I did this.

How it works
===========
It mainly works with the config/config.yml

```lang
mailchimp_config:
    api_key: XXXXXXXXXXXXXXXXXX
    list_id: XXXXXXXXXXX
    #enable the saving in mailchimp part
    enable: true

database_config:
    host: localhost
    port: 3306
    dababase_name: databasename
    user: root
    password: 
    #enable the saving in database part
    enable: true 

#Validation constraints on form's fields
constraints:
    email:
        - Email
    lastname:
        - NotBlank
    firstname:
        - NotBlank

#The matching between the form's field and the mailchimp fields
#MAILCHIMP_FIELD: FORM_FIELD
mailchimp_matching:
    EMAIL: email 
    FNAME: firstname
    LNAME: lastname



#the matching between the form's fields and the database fields
database_matching:
    #the database table
    table: table 
    #the matching fields
    #DATABASE_FIELD: FORM_FIELD
    fields:
        email: email
        prenom: firstname
        nom: lastname
```
    
