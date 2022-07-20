$("#BlogPosterbtn").click(function () {
    $("#myModal").css("display", "block")
})

$(".close").click(function () {
    $("#myModal").css("display", "none")
})

window.onclick = function (event) {
    if (event.target == $("#myModal")) {
        $("#myModal").css("display", "none")
    }
}