function GetURL(t){return"pages/"+t+".html"}function GetFileName(){return window.location.href.match(/[^\/]+$/)[0]}function Logout(){window.localStorage.setItem("email",null),window.localStorage.setItem("logged",!1),window.location.href="login.php"}var content="#app-content",userdata={email:null,logged:!1},profile={init:function(){var t="http://localhost/webapp/app/all-users.php",n=$("#profile-list li");$.ajax(t).done(function(t){t=$.parseJSON(t);for(var i=0;i<t.length;++i){var e=t[i],a=$(n).clone();$(a).find("a").attr("data-send",e.id),$(a).find(".username").html(e.username),$(a).find(".real-name").html(e["real-name"]),$("#profile-list").append(a)}$(n).remove()})}},timetable={build:function(){$(".timetable").each(function(){for(var t=13,n=5,i=t*n,e=$(".timetable .template"),a=0;i>a;a++){var o=$(e).clone();$(o).removeClass("invisible"),$(o).click(function(){$(this).find("form").addClass("active")}),$(o).find("form").submit(function(){var t=$(this).find(".add-subject").val();return $(this).parent().append("<p>"+t+"</p>"),$(this).removeClass("active"),!1}),$(o).find(".delete").click(function(){return $(this).parent().parent().find("p").remove(),$(this).parent().removeClass("active"),!1}),$(this).append(o)}})}},settings={notifications:{sound:!1,vibrate:!1},init:function(){$(".settings-options input").change(function(){var t=$(this).attr("data-var");settings.notifications[t]=$(this).is(":checked")})}},system={init:function(){$("input.switch").each(function(){var t=$(this).attr("data-label");$(this).wrap('<label class="switch">');var n=$("<span>").html(t),i=$("<div>").addClass("switch-background"),e=$("<div>").addClass("switch-handle");$(i).append(e),$(this).parent().append(n).append(i)})}};$("#app-options a:not(.ignore)").click(function(){var t=$(this).attr("href");return;$(function(){$(content).load(GetURL("settings"),function(){system.init(),settings.init();timetable.build()});
