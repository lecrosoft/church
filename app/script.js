function onlineActiveUser() {
  $.get("function.php?onlineUser=result", function (data) {
    $(".useronline").text(data);
  });
}
onlineActiveUser();
