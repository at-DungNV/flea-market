var advancedSearchElements = $('#advanced-search-original-elements').clone().attr('id', 'advanced-search-elements');
$(".advanced-search").click(function() {
  var isClosed = $(this).attr("aria-expanded");
  var isSelectedAdvancedSearchElement = $('#advanced-search').find('select[name="address"]').val() != ''
                                      || $('#advanced-search').find('select[name="type"]').val() != ''
                                      || $('#advanced-search').find('select[name="category"]').val() != ''
                                      || $('#advanced-search').find('select[name="order"]').val() != '';
  if (isClosed == 'true' && !isSelectedAdvancedSearchElement) {
    console.log(isSelectedAdvancedSearchElement);
    // nếu có chọn bất cứ cái nào thì không xóa
    // còn không thì xóa
    $('#advanced-search').find('.panel-body').empty();
  } else {
    advancedSearchElements.css("display", "block");
    $('#advanced-search').find('.panel-body').append(advancedSearchElements);
  }
});