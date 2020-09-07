$(function () {
    $( ".add-salad" ).click(function() {
        $(".remove-salad").removeAttr('disabled');
        $( ".BuildControls_OrderButton__1eKNn").removeAttr('disabled');
        $('.message').remove();
        $('<div class="BurgerIngredients_Salad__3uNBq"></div>').insertAfter( ".BurgerIngredients_BreadTop__1Tgt_" );
    });
    $( ".remove-salad" ).click(function() {
        $( ".BurgerIngredients_Salad__3uNBq" ).last().remove();
        if ($(".BurgerIngredients_Salad__3uNBq" ).length==0) {
            $(".remove-salad").attr('disabled', true);
        }
    });

    $( ".add-cheese" ).click(function() {
        $( ".remove-cheese").removeAttr('disabled');
        $( ".BuildControls_OrderButton__1eKNn").removeAttr('disabled');
        $('.message').remove();
        if ( $( ".BurgerIngredients_Cheese__1RsP3" ).length>0) {
            $(".BurgerIngredients_Cheese__1RsP3:last").after('<div class="BurgerIngredients_Cheese__1RsP3"></div>');
        } 
        else if($( ".BurgerIngredients_Salad__3uNBq" ).length > 0 && $( ".BurgerIngredients_Cheese__1RsP3" ).length==0) {
            $( ".BurgerIngredients_Salad__3uNBq:last" ).after('<div class="BurgerIngredients_Cheese__1RsP3"></div>');
        } else {
            $('<div class="BurgerIngredients_Cheese__1RsP3"></div>').insertAfter( ".BurgerIngredients_BreadTop__1Tgt_" );
        }
       
    });
    $( ".remove-cheese" ).click(function() {
        $( ".BurgerIngredients_Cheese__1RsP3" ).last().remove();
        if ($(".BurgerIngredients_Cheese__1RsP3" ).length==0) {
            $(".remove-cheese").attr('disabled', true);
        }
    });

    $( ".add-bacon" ).click(function() {
        $( ".remove-bacon").removeAttr('disabled');
        $( ".BuildControls_OrderButton__1eKNn").removeAttr('disabled');
        $('.message').remove();
        if ( $( ".BurgerIngredients_Bacon__1Nvb9" ).length>0) {
            $(".BurgerIngredients_Bacon__1Nvb9:last").after('<div class="BurgerIngredients_Bacon__1Nvb9"></div>');
        } 
        else if ( $( ".BurgerIngredients_Cheese__1RsP3" ).length>0 && $( ".BurgerIngredients_Bacon__1Nvb9" ).length==0) {
            $(".BurgerIngredients_Cheese__1RsP3:last").after('<div class="BurgerIngredients_Bacon__1Nvb9"></div>');
        } 
        else if($( ".BurgerIngredients_Salad__3uNBq" ).length > 0 && $( ".BurgerIngredients_Cheese__1RsP3" ).length==0 &&  $( ".BurgerIngredients_Bacon__1Nvb9" ).length==0) {
            $( ".BurgerIngredients_Salad__3uNBq:last" ).after('<div class="BurgerIngredients_Bacon__1Nvb9"></div>');
        } else {
            $('<div class="BurgerIngredients_Bacon__1Nvb9"></div>').insertAfter( ".BurgerIngredients_BreadTop__1Tgt_" );
        }
    });
    $( ".remove-bacon" ).click(function() {
        $( ".BurgerIngredients_Bacon__1Nvb9" ).last().remove();
        if ($(".BurgerIngredients_Bacon__1Nvb9" ).length==0) {
            $(".remove-bacon").attr('disabled', true);
        }
    });

    $( ".add-meat" ).click(function() {
        $(".remove-meat").removeAttr('disabled');
        $( ".BuildControls_OrderButton__1eKNn").removeAttr('disabled');
        $('.message').remove();
        $("<div class='BurgerIngredients_Meat__3rI9h'></div>" ).insertBefore( ".BurgerIngredients_BreadBottom__3qx0s" );
    });
    $( ".remove-meat" ).click(function() {
        $( ".BurgerIngredients_Meat__3rI9h" ).last().remove();
        if ($(".BurgerIngredients_Meat__3rI9h" ).length==0) {
            $(".remove-meat").attr('disabled', true);
        }
    });
    $(document).on('click', '.showModalButton', function () {
        var saladCount =  $('.BurgerIngredients_Salad__3uNBq').length;
        $(".saladCount").html(saladCount);
        var baconCount =  $('.BurgerIngredients_Bacon__1Nvb9').length;
        $(".baconCount").html(baconCount);
        var cheeseCount =  $('.BurgerIngredients_Cheese__1RsP3').length;
        $(".cheeseCount").html(cheeseCount);
        var meatCount =  $('.BurgerIngredients_Meat__3rI9h').length;
        $(".meatCount").html(meatCount);
        var total = $('.totalPrice').html();
        $(".total").html(total);
        $('#modal').modal('show');
    });
    $(document).on('click', '.checkout', function(){
        var saladCount = $(".saladCount").text();
        var baconCount = $(".baconCount").text();
        var cheeseCount = $(".cheeseCount").text();
        var meatCount = $(".meatCount").text();
        var total = $(".total").text();
        $.ajax({
            url: '/burger/checkout',
            type: 'POST',
            data: {
                saladCount: saladCount,
                baconCount: baconCount,
                cheeseCount: cheeseCount,
                meatCount: meatCount,
                total: total
             },
             success: function(data) {
                $('#modal').modal('hide');
                window.location.href = data;

             }
        });
    });
});
  
  