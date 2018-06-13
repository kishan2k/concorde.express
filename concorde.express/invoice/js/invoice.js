// from http://www.mediacollege.com/internet/javascript/number/round.html
function roundNumber(number,decimals) {
  var newString;// The new rounded number
  decimals = Number(decimals);
  if (decimals < 1) {
    newString = (Math.round(number)).toString();
  } else {
    var numString = number.toString();
    if (numString.lastIndexOf(".") == -1) {// If there is no decimal point
      numString += ".";// give it one at the end
    }
    var cutoff = numString.lastIndexOf(".") + decimals;// The point at which to truncate the number
    var d1 = Number(numString.substring(cutoff,cutoff+1));// The value of the last decimal place that we'll end up with
    var d2 = Number(numString.substring(cutoff+1,cutoff+2));// The next decimal, after the last one we want
    if (d2 >= 5) {// Do we need to round up at all? If not, the string will just be truncated
      if (d1 == 9 && cutoff > 0) {// If the last digit is 9, find a new cutoff point
        while (cutoff > 0 && (d1 == 9 || isNaN(d1))) {
          if (d1 != ".") {
            cutoff -= 1;
            d1 = Number(numString.substring(cutoff,cutoff+1));
          } else {
            cutoff -= 1;
          }
        }
      }
      d1 += 1;
    } 
    if (d1 == 10) {
      numString = numString.substring(0, numString.lastIndexOf("."));
      var roundedNum = Number(numString) + 1;
      newString = roundedNum.toString() + '.';
    } else {
      newString = numString.substring(0,cutoff) + d1.toString();
    }
  }
  if (newString.lastIndexOf(".") == -1) {// Do this again, to the new string
    newString += ".";
  }
  var decs = (newString.substring(newString.lastIndexOf(".")+1)).length;
  for(var i=0;i<decimals-decs;i++) newString += "0";
  //var newNumber = Number(newString);// make it a number if you like
  return newString; // Output the result to the form field (change for your purposes)
}

//Calculations
function update_total() {
  var total = 0;
  $('.price').each(function(i){
    price = $(this).html().replace("£","");
    if (!isNaN(price)) total += Number(price);
  });

  total = roundNumber(total,2);

  $('#total').html("£"+total);
  $('#totalInpt').val("£"+total);
  
  update_balance();
}

function update_qty() {
  totalQty = 0;
  $('.qty').each(function(i){
    qty = $(this).val();
    if (!isNaN(qty)) totalQty += Number(qty);
  });

  $('#total-qty').html(totalQty);
  $('#qtyInpt').val(totalQty);
  
}

function update_weight() {
  totalWeight = 0;
  $('.weight').each(function(i){
    weight = $(this).val();
    if (!isNaN(weight)) totalWeight += Number(weight);
  });
  
  totalWeight = roundNumber(totalWeight,2);
  
  $('#total-weight').html(totalWeight);
  $('#weightInpt').val(totalWeight);
  
}

function update_balance() {
  var sub = $("#total").html().replace("£","");
  var subNum = sub * 1;
  var freight = $("#freightInpt").val().replace("£","");
  var freightDue = freight * 1;
  var ins = $("#insInpt").val().replace("£","");
  var insDue = ins * 1;
  var due = subNum + freightDue + insDue;
  due = roundNumber(due,2);
  
  $('.due').html("£"+due);
  //$('.due').val("$"+due);
}

function update_price() {
  var row = $(this).parents('.item-row');
  var price = row.find('.cost').val().replace("£","") * row.find('.qty').val();
  price = roundNumber(price,2);
  isNaN(price) ? row.find('.price').html("N/A") : row.find('.price').html("£"+price);
  isNaN(price) ? row.find('.priceInpt').val("N/A") : row.find('.priceInpt').val("£"+price);
  
  update_qty();
  update_total();
}

function bind() {
  $(".cost").blur(update_price);
  $(".qty").blur(update_price);
  $(".weight").blur(update_weight);
}

//Pageload jquery stuff
$(document).ready(function() {
	
  //Add Row
  $("#addrow").on('click', function(){
  	var lineNo = $('#items textarea').length;
    $('#items tfoot').before('<tr class="item-row"><td class="item-name"><div class="delete-wpr"><a class="delete" href="javascript:;" title="Remove row">X</a><textarea name="descLine' + lineNo + '">Description of Item or Service</textarea></div></td><td><input type="text" name="hsLine' + lineNo + '" class="hsNo" value="" /></td><td><input type="text" name="costLine' + lineNo + '" class="cost" value="$0" /></td><td><input type="text" name="qtyLine' + lineNo + '" class="qty" value="0" /></td><td><input type="text" name="weightLine' + lineNo + '" class="weight" value="0" /></td><td><span class="price">$0</span><input type="hidden" name="priceLine' + lineNo + '" class="priceInpt" /></td></tr>');
    if ($(".delete").length > 0) $(".delete").show();
    //Resize textarea
    $('textarea').autoResize({
		extraSpace: 15
	});
    bind();
  });
  
  //Test Naming Convention
  //$("#testNames").on('click', function(){
  	//var lineNo = $('#items textarea').length;
  	//var lineName = $('#items textarea').get(2).name;
    //alert ('the line name is: ' + lineName);
  //});
	
  //Delete a row
  $(".delete").live('click',function(){
    $(this).parents('.item-row').remove();
    update_qty();
    update_weight();
    update_total();
    //if ($(".delete").length < 2) $(".delete").hide();
  });
  
	
	//Reset
	$('#reset').click(function(){
	$.jStorage.flush();
	window.location.reload();
	});
  
	//Resize textarea
	$('textarea').autoResize({
		extraSpace: 15
	});
  
  //Update Totals On Blur
  //$(".qty").blur(update_qty)
  //$(".weight").blur(update_weight);
  $("#freightInpt").blur(update_balance);
  $("#insInpt").blur(update_balance);
  
  //bind on-blur-updates to new lines
  bind();
  
  //Submit Form to View PDF
	$('#view').click(function() {
  		$('#form').submit();
	});
  
  //Logo Stuff not using
  
  $("#cancel-logo").click(function(){
    $("#logo").removeClass('edit');
  });
  $("#delete-logo").click(function(){
    $("#logo").remove();
  });
  $("#change-logo").click(function(){
    $("#logo").addClass('edit');
    $("#imageloc").val($("#image").attr('src'));
    $("#image").select();
  });
  $("#save-logo").click(function(){
    $("#image").attr('src',$("#imageloc").val());
    $("#logo").removeClass('edit');
  });
  
//Stuff I was not sure about
 //Calculations
 //$('input').click(function(){
   // $(this).select();
 // });
  
});