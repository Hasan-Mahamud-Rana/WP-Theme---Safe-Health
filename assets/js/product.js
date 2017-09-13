jQuery(document).ready(function() {
  jQuery("ul.acf-checkbox-list.checkbox .checkbox").click(function(){
    var checkedValue = jQuery('ul.acf-checkbox-list.checkbox .checkbox:checked').map(function() {
        return this.value;
    }).get();

    var value1 = checkedValue[0];
    var value2 = checkedValue[1];
    var value3 = checkedValue[2];
    var value4 = checkedValue[3];

    var chk11 = jQuery("ul.acf-checkbox-list.checkbox li label input[type='checkbox'][value="+value1+"]");
    var chk12 = jQuery("ul#product_catchecklist li label input[type='checkbox'][value="+value1+"]");

    var chk21 = jQuery("ul.acf-checkbox-list.checkbox li label input[type='checkbox'][value="+value2+"]");
    var chk22 = jQuery("ul#product_catchecklist li label input[type='checkbox'][value="+value2+"]");

    var chk31 = jQuery("ul.acf-checkbox-list.checkbox li label input[type='checkbox'][value="+value3+"]");
    var chk32 = jQuery("ul#product_catchecklist li label input[type='checkbox'][value="+value3+"]");

    var chk41 = jQuery("ul.acf-checkbox-list.checkbox li label input[type='checkbox'][value="+value4+"]");
    var chk42 = jQuery("ul#product_catchecklist li label input[type='checkbox'][value="+value4+"]");

    cahnageValue(chk11, chk12);
    cahnageValue(chk21, chk22);
    cahnageValue(chk31, chk32);
    cahnageValue(chk41, chk42);
  });

  function cahnageValue(chk1, chk2){
    chk1.on('change', function(){
      chk2.prop('checked',this.checked);
    });
    chk2.on('change', function(){
      chk1.prop('checked',this.checked);
    });
  }

});