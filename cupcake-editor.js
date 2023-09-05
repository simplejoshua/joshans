


$( document ).ready(function() {



    // LEFT PANE 
    
    $("#createNow").on("click", function() {
        $(".playNow").css("visibility", "hidden")
    });

    $("#flavor").on("click", function() {
        $(".select").css("background-color", "#5b4b49")
        $(this).css("background-color", "#6e6721")
        $(".tray").css("visibility", "hidden")
        $("#flavorTray").css("visibility", "visible")
    });
    document.getElementById("lining").onclick = function() {
        $(".select").css({"background-color":"#5b4b49"})
        $(this).css({"background-color":"#6e6721"})
        $(".tray").css("visibility", "hidden")
        $("#liningTray").css("visibility", "visible")
    };
    document.getElementById("frosting").onclick = function() {
        $(".select").css({"background-color":"#5b4b49"})
        $(this).css({"background-color":"#6e6721"})
        $(".tray").css("visibility", "hidden")
        $("#frostingTray").css("visibility", "visible")
    };
    document.getElementById("topper").onclick = function() {
        $(".select").css({"background-color":"#5b4b49"})
        $(this).css({"background-color":"#6e6721"})
        $(".tray").css("visibility", "hidden")
        $("#topperTray").css("visibility", "visible")
    };
    document.getElementById("box").onclick = function() {
        $(".select").css({"background-color":"#5b4b49"})
        $(this).css({"background-color":"#6e6721"})
        $(".tray").css("visibility", "hidden")
        $("#boxTray").css("visibility", "visible")
    };
       

    // RIGHT PANE SCRIPTS

    $("#chocolate").on("click", function() {
        $(".flavor-full").css("visibility","hidden")
        $("#" + this.id + "-full").css("visibility","visible")
    });
    $("#redVelvet").on("click", function() {
        $(".flavor-full").css("visibility","hidden")
        $("#" + this.id + "-full").css("visibility","visible")
    });
    $("#butter").on("click", function() {
        $(".flavor-full").css("visibility","hidden")
        $("#" + this.id + "-full").css("visibility","visible")
    });


    $("#noFrosting").on("click", function() {
        $(".frosting-full").css("visibility","hidden")
    });
    $("#frosting1").on("click", function() {
        $(".frosting-full").css("visibility","hidden")
        $("#" + this.id + "-full").css("visibility","visible")
    });
    $("#frosting2").on("click", function() {
        $(".frosting-full").css("visibility","hidden")
        $("#" + this.id + "-full").css("visibility","visible")
    });
    $("#frosting3").on("click", function() {
        $(".frosting-full").css("visibility","hidden")
        $("#" + this.id + "-full").css("visibility","visible")
    });
    $("#frosting4").on("click", function() {
        $(".frosting-full").css("visibility","hidden")
        $("#" + this.id + "-full").css("visibility","visible")
    });
    $("#frosting5").on("click", function() {
        $(".frosting-full").css("visibility","hidden")
        $("#" + this.id + "-full").css("visibility","visible")
    });
    $("#frosting6").on("click", function() {
        $(".frosting-full").css("visibility","hidden")
        $("#" + this.id + "-full").css("visibility","visible")
    });
    $("#frosting7").on("click", function() {
        $(".frosting-full").css("visibility","hidden")
        $("#" + this.id + "-full").css("visibility","visible")
    });
    $("#frosting8").on("click", function() {
        $(".frosting-full").css("visibility","hidden")
        $("#" + this.id + "-full").css("visibility","visible")
    });


    
    $("#bakeNow").click(function() {
        $('html, body').animate({
            scrollTop: $("div.mainCreate").offset().top
          }, 0)
        $(".masterOrderForm").css(
            "visibility" , "visible")
        $("#backdrop").css(
            "visibility" , "visible")
        $.scrollLock( true );
        
    })
});