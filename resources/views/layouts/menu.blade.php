<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="http://bootstraptema.ru/snippets/menu/2017/vam.md.css" />
{{--<script src="http://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>--}}
<script src="http://bootstraptema.ru/snippets/menu/2017/vam.md.js"></script>
<div class="col-md-2 col-md-offset-4">
    <div id="jquery-accordion-menu" style="min-width: 100px;" class="jquery-accordion-menu black">
        <ul id="demo-list">
            <li><a href="#"><i class="fa fa-suitcase"></i>Администрирование</a>
            <ul class="submenu">
            <li><a href="#">Настройка баланса </a></li>
            <li><a href="#">Призы </a>
            <span class="jquery-accordion-menu-label">3 </span>

        </ul>

    </div>

</div><!-- ./col-md-4 col-md-offset-4 -->



<script type="text/javascript">
    //обработчик
    jQuery(document).ready(function () {
        jQuery("#jquery-accordion-menu").jqueryAccordionMenu();
    });
    //активный класс
    $(function(){
        $("#demo-list li").click(function(){
            $("#demo-list li.active").removeClass("active")
            $(this).addClass("active");
        })
    })
</script>

<script type="text/javascript">
    //поисковая строка
    (function($) {
        $.expr[":"].Contains = function(a, i, m) {
            return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
        };
        function filterList(header, list) {
            var form = $("<form>").attr({
                "class":"filterform",
                action:"#"
            }), input = $("<input>").attr({
                "class":"filterinput",
                type:"text"
            });
            $(form).append(input).appendTo(header);
            $(input).change(function() {
                var filter = $(this).val();
                if (filter) {
                    $matches = $(list).find("a:Contains(" + filter + ")").parent();
                    $("li", list).not($matches).slideUp();
                    $matches.slideDown();
                } else {
                    $(list).find("li").slideDown();
                }
                return false;
            }).keyup(function() {
                $(this).change();
            });
        }
        $(function() {
            filterList($("#form"), $("#demo-list"));
        });
    })(jQuery);
</script>