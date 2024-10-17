<script type="text/javascript" defer>
    var noofLinesRange = '';
    var zohoPhones = '';
    var $zoho = $zoho || {};
    $zoho.salesiq = $zoho.salesiq || {
        widgetcode: "a7824e949514cbf23c42ed772d9b7334ff7ee4ba690ac990f3b11ba8d41c4fdbca6768c3b3a268aec28de677b0164255",
//        widgetcode: "siqd68e2852170abfca5dff2af7b2a56cf8069a6385f7ddc89ece1c87dd78a193c2",
        // widgetcode: "d8ed7e556efc3aa379e95fc8bff7fa1c1cbf06f8be5150cb597d61fbbd96920a448311ff4338f8a3828a7d3384919a3a06deaff4246c01ebd7eedb944170ae79",
        values: {},
        ready: function() {}
    };
    var d = document;
    s = d.createElement("script");
    s.type = "text/javascript";
    s.id = "zsiqscript";
    s.defer = true;
    s.src = "https://salesiq.zoho.in/widget";
    t = d.getElementsByTagName("script")[0];
    t.parentNode.insertBefore(s, t);
    // d.write("<div id='zsiqwidget'></div>");
    var zohodiv = document.createElement('div');
    zohodiv.setAttribute("id", "zsiqwidget");
    document.body.appendChild(zohodiv);
    $zoho.salesiq.ready = function(embedinfo) {
//        $zoho.salesiq.chat.logo("https://d1dms8ke14gwlt.cloudfront.net/wp-content/uploads/2018/10/cch-footer-logo.png");
        // $zoho.salesiq.chat.theme('#2d5be7');

        $zoho.salesiq.chat.defaultdepartment("CCH Sales");
        $zoho.salesiq.chat.department(["CCH Sales"]);
        
        // Adding phone number field
        $zoho.salesiq.customfield.add({
            "name": "Phone",
            "hint": "Enter your phone number (Required)",
            "type": "number",
            "required": "true",
            "visibility": "online",
            "minlength": "10",
            "maxlength": "16",
            "callback":function(value){
                // console.log(value);
                zohoPhones = value;
            }
        });

        // Adding number of user field
        $zoho.salesiq.customfield.add({
            "name": "Number of Lines Range_1",
            "hint": "Number of users (Required)",
            "type": "selectbox",
            "required": "true",
            "visibility": "online",
            "options": [
                {
                    "text": "1 - 3",
                    "value": "1-3"
                },
                {
                    "text": "4 - 9",
                    "value": "4-9"
                },
                {
                    "text": "10 - 19",
                    "value": "10-19"
                },
                {
                    "text": "20 - 49",
                    "value": "20-49"
                },
                {
                    "text": "50 - 99",
                    "value": "50-99"
                },
                {
                    "text": "100+",
                    "value": "100+"
                }
            ],
            "callback":function(value){
                // console.log(value);
                noofLinesRange = value;
            }
        });
        
        
        
        $zoho.salesiq.visitor.chat(function(visitid, data) {
            console.log("visitorchat");
             TrackinMyApplication(data.name,data.email,zohoPhones);
            // console.log(data);
        });  
    };    
</script>


<script type="text/javascript">

    function TrackinMyApplication(names,emails,phones = 0){


        $.ajax({
            url: '../assets/includes/zohoHook.php',
            type: 'POST',
            data: $('form:first').serialize() + '&names=' + names + '&emails=' + emails + '&phones=' + phones + '&noofLinesRange=' + noofLinesRange,
            success: function (data) {
                console.log(data);
                //window.location.href = "https://www.servetel.in/thank-you/";
            }
        });
    }
</script>