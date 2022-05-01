<html>
<head>
  <title>Edit HTML table Inline and adding new records to the existing</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  
</head>
<body>
<div class="container">
<h3>Edit HTML table Inline,deleting,updating and adding new records to the existing</h3>
 <form>
	<div class="form-group">
		<label>Name:</label>
		<input type="text" name="name" class="form-control" value="Elijah sunwa" required="">
	</div>

	<div class="form-group">
		<label>Email:</label>
		<input type="text" name="email" class="form-control" value="elijahsunwa@gmail.com" required="">
	</div>
	<div class="form-group">
		<label>Phone:</label>
		<input type="text" name="password" class="form-control" value="+254721729081" required="">
	</div>

	<button type="submit" class="btn btn-success save-btn">Save</button>
</form>
<br/>
		
 <table class="table table-bordered table-responsive-lg data-table">
	<thead>
	<th>Name</th>
	<th>Email</th>
	<th>Phone</th>
	<th width="200px">Action</th>
	</thead>
	<tbody>
	</tbody>
 </table>

</div>
</body>
<script type="text/javascript">
     var name = "Elijah sunwa";
     var password = "+254721729081";
     var email = "elijahsunwa@gmail.com";

    for (var i = 0; i<20;i++){
        $(".data-table tbody").append("<tr   data-name='"+name+"' data-email='"+email+"' data-password='"+password+"'><td>"+name+"</td><td>"+email+"</td><td>"+password+"</td><td><button class='btn btn-info btn-xs btn-edit'>Edit</button><button data-id='tr"+i+"' class='btn btn-danger btn-xs btn-delete'>Delete</button></td></tr>");
    }

    $("form").submit(function(e){
        e.preventDefault();
        var name = $("input[name='name']").val();
        var email = $("input[name='email']").val();
        var password = $("input[name='password']").val();

        $(".data-table tbody").append("<tr data-name='"+name+"' data-email='"+email+"' data-password='"+password+"'><td>"+name+"</td><td>"+email+"</td><td>"+password+"</td><td><button class='btn btn-info btn-xs btn-edit'>Edit</button><button class='btn btn-danger btn-xs btn-delete'>Delete</button></td></tr>");

        $("input[name='name']").val('');
        $("input[name='email']").val('');
        $("input[name='password']").val('');
    });

    $("body").on("click", ".btn-delete", function(){
        var id = $(this).data('id')
        var   password = $(this).parents("tr").find("input[name='edit_password']").val();
        var  email = $(this).parents("tr").find("input[name='edit_email']").val();
        var  name = $(this).parents("tr").find("input[name='edit_name']").val();
        //alert(" password ===>> "+password+" email ===>> "+email+" name ===>> "+name);

       
        $(this).parents("tr").remove();
    });

    $("body").on("click", ".btn-edit", function(){
        var name = $(this).parents("tr").attr('data-name');
        var email = $(this).parents("tr").attr('data-email');
        var password = $(this).parents("tr").attr('data-password');

        //for (var i = 0; i<20;i++){
            $(this).parents("tr").find("td:eq(0)").html('<input name="edit_name" value="'+name+'">');
            $(this).parents("tr").find("td:eq(1)").html('<input name="edit_email" value="'+email+'">');
            $(this).parents("tr").find("td:eq(2)").html('<input name="edit_password" value="'+password+'">');
            $(this).parents("tr").find("td:eq(3)").prepend("<button class='btn btn-info btn-xs btn-update'>Update</button><button class='btn btn-warning btn-xs btn-cancel'>Cancel</button>")

       // }

        $(this).hide();

    });

    $("body").on("click", ".btn-cancel", function(){
        var name = $(this).parents("tr").attr('data-name');
        var email = $(this).parents("tr").attr('data-email');
        var password = $(this).parents("tr").attr('edit_password');


        $(this).parents("tr").find("td:eq(0)").text(name);
        $(this).parents("tr").find("td:eq(1)").text(email);
        $(this).parents("tr").find("td:eq(2)").text(password);

        $(this).parents("tr").find(".btn-edit").show();
        $(this).parents("tr").find(".btn-update").remove();
        $(this).parents("tr").find(".btn-cancel").remove();
    });

    $("body").on("click", ".btn-update", function(){
        var name = $(this).parents("tr").find("input[name='edit_name']").val();
        var email = $(this).parents("tr").find("input[name='edit_email']").val();
        var password = $(this).parents("tr").find("input[name='edit_password']").val();


        $(this).parents("tr").find("td:eq(0)").text(name);
        $(this).parents("tr").find("td:eq(1)").text(email);
        $(this).parents("tr").find("td:eq(2)").text(password);

        $(this).parents("tr").attr('data-name', name);
        $(this).parents("tr").attr('data-email', email);
        $(this).parents("tr").attr('data-password', email);

        $(this).parents("tr").find(".btn-edit").show();
        $(this).parents("tr").find(".btn-cancel").remove();
        $(this).parents("tr").find(".btn-update").remove();
    });
</script>
</html>