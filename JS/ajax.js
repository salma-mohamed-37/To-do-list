function view()
{
   var xmlhttp = new XMLHttpRequest();
   xmlhttp.onreadystatechange = function()
   {
      if(this.status == 200 && this.readyState == 4)
      {
         document.getElementsByTagName("ul")[0].innerHTML = this.responseText ;
      }
   };
   xmlhttp.open("GET", "CRUDtask.php?event=view",true);
   xmlhttp.send();
}

function insert()
{
   var xmlhttp = new XMLHttpRequest();
   var task = document.getElementsByName('task')[0].value;
   xmlhttp.onreadystatechange = function()
   {
      if(this.status == 200 && this.readyState == 4)
      {
         document.getElementById("message").innerHTML = this.responseText ;
         view();
      }
   };
   xmlhttp.open("POST", "CRUDtask.php?event=add",true);
   xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   xmlhttp.send("task="+task);
}

function update()
{
   tid = document.getElementById("htid").value ;
   var task = document.getElementById('update').value;
   var xmlhttp = new XMLHttpRequest(); 
   xmlhttp.onreadystatechange = function()
   {
      if(this.status == 200 && this.readyState == 4)
      {
         document.getElementById("updatePart").style.display = "none" ;
         document.getElementById("message").innerHTML = this.responseText ;
         view();
      }
   };
   xmlhttp.open("POST", "CRUDtask.php?event=update&id="+tid,true);
   xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   xmlhttp.send("task="+task);
}

function viewToUpdate (tid)
{
   document.getElementById("updatePart").style.display = "block" ;
   document.getElementById("htid").value = tid;
   var xmlhttp = new XMLHttpRequest(); 
   xmlhttp.onreadystatechange = function()
   {
      if(this.status == 200 && this.readyState == 4)
      {
         document.getElementById("update").value = this.responseText;
      }
   };
   xmlhttp.open("GET", "CRUDtask.php?event=viewToUpdate&id="+tid,true);
   xmlhttp.send();
}

function Delete(tid)
{
   var xmlhttp = new XMLHttpRequest();
   xmlhttp.onreadystatechange = function()
   {
      if(this.status == 200 && this.readyState == 4)
      {
         document.getElementById("message").innerHTML = this.responseText ;
         view();
      }
   };
   xmlhttp.open("GET", "CRUDtask.php?event=delete&id="+tid,true);
   xmlhttp.send();
}

function signup()
{
   var xmlhttp = new XMLHttpRequest();
   var firstname = document.getElementsByName('firstname')[0].value;
   var lastname = document.getElementsByName('lastname')[0].value;
   var username = document.getElementsByName('username')[0].value;
   var password = document.getElementsByName('password')[0].value;
   var cpassword = document.getElementsByName('cpassword')[0].value;
   if(validate(firstname,lastname,username,password,cpassword))
   {
      xmlhttp.onreadystatechange = function()
      {
         if(this.status == 200 && this.readyState == 4)
         {
            document.getElementById("message").innerHTML = this.responseText ;
            document.getElementById("error").innerHTML="";
         }
      };
   xmlhttp.open("POST", "authentication.php?submit=signup",true);
   xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   xmlhttp.send("firstname="+firstname+"&lastname="+lastname+"&username="+username+"&password="+password);
   }
}

function complete(tid)
{
   var xmlhttp = new XMLHttpRequest();
   xmlhttp.onreadystatechange = function()
   {
      if(this.status == 200 && this.readyState == 4)
      {
         view();
      }
   };
   xmlhttp.open("GET", "CRUDtask.php?event=complete&id="+tid,true);
   xmlhttp.send();
}


