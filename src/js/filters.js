var $ = require("jquery");

//Mobile Show/Hidden
$(".filter-open-js").on("click", function(){
  $(".filter-card-js").toggle(".hidden");
});

$(".average-check-value-js").on("change", function () {
  var averageValue = $(".average-check-value-js").val();
  $(".average-check-value-html-js").html(averageValue);
});

$(".filter-submit-js").on("click", function () {
  let current_author = $(".author-select").val();
  let current_site = $(".site-select").val();
  console.log(current_author);
  console.log(current_site);
  $.ajax({
    type: "POST",
    url: "/wp-admin/admin-ajax.php",
    dataType: "html",
    data: {
      action: "filter_places_click_action",
      current_author: current_author,
      current_site: current_site,
    },
    beforeSend: function() {
      console.log("before");
    },
    success: function (res) {
      $("#response").html(res);
    },
  });
});
