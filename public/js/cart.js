
$(function (){
    $('.row-quantity').on('change', function (){
        let rowProductEl = $(this).parents('.row-product');
        let rowPrice = rowProductEl.data('price');
        rowProductEl.find('.row-total').html('$'+ $(this).val()*rowPrice);
    })
})
