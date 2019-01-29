<?php
session_start();
include '../includes/AdminHeader.php';

//This page allows an admin to enter a new product.
//It contains a form which requires information on a product such as the title, category, rental price etc.
//There is validation on this form to ensure all required fields are populated before submitting.
//The form will then submit to another PHP script that will carry out the INSERT of the product. 

?>

	
	<div class="container">
		<div class="bs-docs-section">
			
			<div class="row">
			  <div class="col-lg-12">
				<div class="page-header">
				  <h1 id="forms">Add a Product:</h1>
				</div>
			  </div>
			</div>
			
			<div class="row">
				<div class="col-lg-12 col-md-12">
				
					<div class="col-lg-2 col-md-2">
					</div>
					
					<div class="col-lg-8 col-md-8">
					<p align="center">Enter the details of your a product ensuring to include its category and description as well as rental price. <br>Uploading an image of the product helps too! 
					Once you submit this form, users will be able to view the product on the site and book!</p><br><font color="red">Fields marked with a * are required</font>
						<div class="well bs-component">
							<form method="GET" action="insertProduct.php" name="addProduct" onsubmit="return validateAddProduct()" class="form-horizontal">
								
								<fieldset>
									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label for="inputPTitle" class="col-lg-2 control-label">Product Title:<font color="red">*</font></label>
											<div class="col-lg-10">
												<input type="text" class="form-control" name="title" placeholder="Product Title">
											</div>
										</div>
									  
										<div class="form-group">
											<label for="inputDescription" class="col-lg-2 control-label">Description:<font color="red">*</font></label>
											<div class="col-lg-10">
												<textarea rows="4" cols="50" class="form-control" name="description" placeholder="Description"></textarea>
											</div>
										</div>
										
										<div class="form-group">
											<label for="img" class="col-lg-2 control-label">Image:<font color="red">*</font></label>
											<div class="col-lg-10">
												<input type="file" class="form-control" name="image">
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label for="inputCategory" class="col-lg-2 control-label">Category:<font color="red">*</font></label>
											<div class="col-lg-10">
												<select name="Category" class="form-control">
													<option value=""> </option>
													<option value="DVD" name="dvd">DVD</option>
													<option value="Blu_Ray" name="Blu_Ray">Blu-Ray</option>
													<option value="Games" name="games">Games</option>
												</select>
											</div>
										</div>
										
										<div class="form-group">
											<label for="inputPrice" class="col-lg-2 control-label">Rental Price:<font color="red">*</font></label>
											<div class="col-lg-10">
												<input type="decimal" class="form-control" name="Price" placeholder="Rental Price">
											</div>
										</div>
										
										<div class="form-group">
											<label for="inputRating" class="col-lg-2 control-label">Rating:<font color="red">*</font></label>
											<div class="col-lg-10">
												<select name="Rating" class="form-control">
													<option value=""> </option>
													<option value="u" name="u">Universal</option>
													<option value="PG" name="PG">Parental Guidance</option>
													<option value="12" name="12">12</option>
													<option value="15" name="15">15</option>
													<option value="18" name="18">18</option>
													<option value="R18" name="R18">Restricted 18</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-10 col-lg-offset-2" align="right">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
					
					<div class="col-lg-2 col-md-2">
					</div>
					
				</div>
			</div>
		</div>
		

<script>
function validateAddProduct() {
	var x = document.forms["addProduct"]["title"].value;
	if (x == null || x == "") {
		alert("Please enter a product title!");
		addProduct.title.focus();
		return false;
	}
	
	var x = document.forms["addProduct"]["description"].value;
	if (x == null || x == "") {
		alert("Please enter a product description");
		addProduct.description.focus();
		return false;
	}
	
	var x = document.forms["addProduct"]["Category"].value;
	if (x == null || x == "") {
		alert("Please select a product category");
		addProduct.Category.focus();
		return false;
	}
	
	var x = document.forms["addProduct"]["Price"].value;
	if (x == null || x == "") {
		alert("Please enter a rental price for this product!");
		addProduct.Price.focus();
		return false;
	}
	
	var x = document.forms["addProduct"]["Rating"].value;
	if (x == null || x == "") {
		alert("Please select a product viewing rating!");
		addProduct.Rating.focus();
		return false;
	}
	alert("Your product has been added!");
}
</script>

<?php include '../includes/AdminFooter.php'; ?>