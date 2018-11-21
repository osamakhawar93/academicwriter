
$(function () {
    var changeDirection = function (dir, align) {
        this.selection.save();
        var elements = this.selection.blocks();
        for (var i = 0; i < elements.length; i++) {
            var element = elements[i];
            if (element != this.$el.get(0)) {
                $(element)
                        .css('direction', dir)
                        .css('text-align', align);
            }
        }

        this.selection.restore();
    }

    $.FroalaEditor.DefineIcon('rightToLeft', {NAME: 'long-arrow-left'});
    $.FroalaEditor.RegisterCommand('rightToLeft', {
        title: 'RTL',
        focus: true,
        undo: true,
        refreshAfterCallback: true,
        callback: function () {
            changeDirection.apply(this, ['rtl', 'right']);
        }
    })

    $.FroalaEditor.DefineIcon('leftToRight', {NAME: 'long-arrow-right'});
    $.FroalaEditor.RegisterCommand('leftToRight', {
        title: 'LTR',
        focus: true,
        undo: true,
        refreshAfterCallback: true,
        callback: function () {
            changeDirection.apply(this, ['ltr', 'left']);
        }
    })
    
    //Template 1
    $.FroalaEditor.DefineIcon('insertParagraph', {NAME: 'plus'});
    $.FroalaEditor.RegisterCommand('insertParagraph', {
      title: 'Insert a Paragraph',
      focus: true,
      undo: true,
      refreshAfterCallback: true,
      callback: function () {
        var html = paragraph();
        
        this.html.insert(html);
        this.undo.saveStep();
      }
    });
    
    //Template 2 | Styled List
    $.FroalaEditor.DefineIcon('styledList', {NAME: 'list-ul'});
    $.FroalaEditor.RegisterCommand('styledList', {
      title: 'Styled List',
      focus: true,
      undo: true,
      refreshAfterCallback: true,
      callback: function () {
        var html = styledList();
        
        this.html.insert(html);
        this.undo.saveStep();
      }
    });
    
    //Template 3 | Table 1
    $.FroalaEditor.DefineIcon('table1', {NAME: 'table'});
    $.FroalaEditor.RegisterCommand('table1', {
      title: 'Table1',
      focus: true,
      undo: true,
      refreshAfterCallback: true,
      callback: function () {
        var html = table1();
        
        this.html.insert(html);
        this.undo.saveStep();
      }
    });
    
    //Template 4 | Cover Page
    $.FroalaEditor.DefineIcon('cover', {NAME: 'book'});
    $.FroalaEditor.RegisterCommand('cover', {
      title: 'Cover Page',
      focus: true,
      undo: true,
      refreshAfterCallback: true,
      callback: function () {
        var html = coverPage();
        
        this.html.insert(html);
        this.undo.saveStep();
      }
    });
    
    //Template 5 | Table 2
    $.FroalaEditor.DefineIcon('table2', {NAME: 'table'});
    $.FroalaEditor.RegisterCommand('table2', {
      title: 'Table2',
      focus: true,
      undo: true,
      refreshAfterCallback: true,
      callback: function () {
        var html = table2();
        
        this.html.insert(html);
        this.undo.saveStep();
      }
    });
    
    //Template 6 | Unordered List
    $.FroalaEditor.DefineIcon('unorderedList', {NAME: 'list-ul'});
    $.FroalaEditor.RegisterCommand('unorderedList', {
      title: 'Unordered List',
      focus: true,
      undo: true,
      refreshAfterCallback: true,
      callback: function () {
        var html = unorderdList();
        
        this.html.insert(html);
        this.undo.saveStep();
      }
    });
    
    //Template 7 | Ordered List
    $.FroalaEditor.DefineIcon('orderedList', {NAME: 'list-ol'});
    $.FroalaEditor.RegisterCommand('orderedList', {
      title: 'Ordered List',
      focus: true,
      undo: true,
      refreshAfterCallback: true,
      callback: function () {
        var html = orderedList();
        
        this.html.insert(html);
        this.undo.saveStep();
      }
    });
    
    
    
    //Custom Dropdow
    $.FroalaEditor.DefineIcon('my_dropdown', {NAME: 'cog'});
    $.FroalaEditor.RegisterCommand('my_dropdown', {
        title: 'Advanced options',
        type: 'dropdown',
        focus: false,
        undo: false,
        refreshAfterCallback: true,
        options: {
            'paragraph': 'Paragraph',
            'styledList': 'Styled List',
            'unorderdList': 'Unordered List',
            'orderedList': 'Ordered List',
            'table1': 'Table 1',
            'table2': 'Table 2',
            'coverPage': 'Cover Page',
        },
        callback: function (cmd, val) {
            try{
                if(typeof window[val] === "function"){
                    var html = window[val]();
                    this.html.insert(html);
                    this.undo.saveStep();
                }
            }
            catch(ex){
                console.log(ex);
            }
            
        },
        // Callback on refresh.
        refresh: function ($btn) {
            //console.log('do refresh');
            //console.log('btn is ' + $btn);
        },
        // Callback on dropdown show.
        refreshOnShow: function ($btn, $dropdown) {
            console.log('do refresh when show');
        }
    });
    

    //TinyMCE
    $(function() {
        var options = {
            fontFamily: {
                "Heebo": 'Heebo Regular',
                "Roboto,sans-serif": 'Roboto',
                "Oswald,sans-serif": 'Oswald',
                "Montserrat,sans-serif": 'Montserrat',
                "'Open Sans Condensed',sans-serif": 'Open Sans Condensed',
            },
            fontFamilySelection: true,
            paragraphStyles: {
                class1: 'Class 1',
                class2: 'Class 2'
            },
            toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'fontFamily', 'fontSize', 'color', 'formatBlock', 'blockStyle', 'inlineStyle', 'align', 'insertOrderedList', 'insertUnorderedList', 'outdent', 'indent', 'paragraphStyle', 'selectAll', 'createLink', 'insertImage', 'insertVideo', 'table', 'undo', 'redo', 'html', 'save', 'insertHorizontalRule', 'uploadFile', 'removeFormat', '|', 'my_dropdown']
        };// End Options
        
        if(layoutDirection == 'rtl'){
            options.direction = 'rtl';
        }
        
        //Initialize Frola Editor
        $('#txtText').froalaEditor(options);
        
    });
});



//Templates HTML Functions
function paragraph(){
    
    var html = $('#template-paragraph').html();
    return html;
}

function styledList(){
    var html = $('#template-styledlist').html();
    return html;
    //return '<div class="main_wrapper"><div class="container clearfix" style="width:90%; margin:0 auto;"><div class="row"><h3 style="font-family: \'OpenSansHebrew-Bold\';">מטרות לשנת 2016</h3><div class="content_area" style="padding-top:50px;"><ol class="simple_ul_txt clearfix" style="font-family: \'OpenSansHebrew-Bold\';list-style: none; counter-reset: li; padding:0;"><li style="counter-increment: li; color:#542791;font-family: \'OpenSansHebrew-Bold\';margin-bottom:10px;">עמידה ביעדים הפיסקליים וצמצום ההון השחור</li><li style="counter-increment: li; color:#542791;font-family: \'OpenSansHebrew-Bold\';margin-bottom:10px;">הגדלת ההיצע של יחידות הדיור</li><li style="counter-increment: li; color:#542791;font-family: \'OpenSansHebrew-Bold\';margin-bottom:10px;">הפחתת עלויות והגברת נגישות במגזר הפיננסי</li><li style="counter-increment: li; color:#542791;font-family: \'OpenSansHebrew-Bold\';margin-bottom:10px;">הגדלת הפריון</li><li style="counter-increment: li; color:#542791;font-family: \'OpenSansHebrew-Bold\';margin-bottom:10px;">הבטחת חיסכון פנסיוני הולם</li><li style="counter-increment: li; color:#542791;font-family: \'OpenSansHebrew-Bold\';margin-bottom:10px;">שיפור הניהול בחברות הממשלתיות</li></ol></div></div></div></div>';
}

function unorderdList(){
    var html = $('#template-unorderedlist').html();
    return html;
    //return '<div class=main_wrapper style=color:#000;direction:rtl;font-family:OpenSansHebrew-Regular;text-align:right;font-size:1.5em><div class="clearfix container"style="width:90%;margin:0 auto"><div class=row><h3 style=color:#542791>משימות מרכזיות:</h3><div class=content_area><ul class="clearfix simple_ul"style="list-style-type:square;counter-reset:li;padding:0 15px;font-size:16px"><li style=color:#542791><p style=color:#000>פרסום הנומרטור – מסגרת פיסקלית רב-שנתית<li style=color:#542791><p style=color:#000>אישור תקציב 7102<li style=color:#542791><p style=color:#000>ישום המלצות ועדת לוקר לצמצום השימוש במזומן<li style=color:#542791><p style=color:#000>העמקת האכיפת של חובת הדיווח על-פי הכללים הקיימים<li style=color:#542791><p style=color:#000>הרחבת הכללים המחייבים בהגשת דו"ח שנתי</ul></div></div></div></div>';
}

function orderedList(){
    var html = $('#template-orderedlist').html();
    return html;
    //return '<div class=main_wrapper style=color:#000;direction:rtl;font-family:OpenSansHebrew-Regular;text-align:right;font-size:1.5em><div class="clearfix container"style="width:90%;margin:0 auto"><div class=row><h3 style=color:#542791>משימות מרכזיות:</h3><div class=content_area><hr style="border:1px solid #000;margin:5px auto"><ol class="clearfix simple_ul"style="padding:0 15px;font-size:16px"><li style=color:#542791><p style=color:#000>פרסום הנומרטור – מסגרת פיסקלית רב-שנתית<li style=color:#542791><p style=color:#000>אישור תקציב 7102<li style=color:#542791><p style=color:#000>ישום המלצות ועדת לוקר לצמצום השימוש במזומן<li style=color:#542791><p style=color:#000>העמקת האכיפת של חובת הדיווח על-פי הכללים הקיימים<li style=color:#542791><p style=color:#000>הרחבת הכללים המחייבים בהגשת דו"ח שנתי</ol></div></div></div></div>';
}

function table1(){
    var html = $('#template-table1').html();
    return html;
    //return '<div class=main_wrapper><div class="clearfix container"><div class=row><h3 style=font-family:OpenSansHebrew-Bold>מדדים מרכזיים לשנת 6102 - משרד האוצר</h3><div class=content_area><ul style=margin-bottom:0;clear:both;float:none;list-style-type:none;padding:0;text-align:center;background-color:#fff;font-family:OpenSansHebrew-Bold><li style=visibility:hidden;width:5%;display:inline-block;vertical-align:top>*<li style=visibility:hidden;width:78%;display:inline-block;vertical-align:top>*<li style=width:5%;display:inline-block;vertical-align:top>2015<li style=width:5%;display:inline-block;vertical-align:top>2016<li style=width:5%;display:inline-block;vertical-align:top>מגמה</ul><ul style="background-color:#c1a8da;clear:both;float:none;list-style-type:none;margin:0 auto 20px;padding:0;text-align:center"><li style="display:inline-block;height:60px;padding:10px 3px;width:5%;background-color:#fff;color:#542791;font-size:30px;font-family:OpenSansHebrew-Bold;vertical-align:top">1<li style="background-color:#c1a8da;display:inline-block;vertical-align:top;height:60px;padding:10px 3px;width:78%;text-align:right">רמת אי-השוויון (מדד ג\'יני ברוטו)<br><span style=background-color:#e9e0f2;display:block>0.4 |2018   0.42| 2017</span><li style="background-color:#c1a8da;display:inline-block;vertical-align:top;height:60px;padding:20px 3px;width:5%">0.47<li style="background-color:#c1a8da;display:inline-block;vertical-align:top;height:60px;padding:20px 3px;width:5%">0.44<li style="background-color:#c1a8da;display:inline-block;vertical-align:top;height:60px;padding:10px 3px;width:5%"><a href=#><img src=arrow.png style="margin:0 auto"></a></ul><ul style="background-color:#c1a8da;clear:both;float:none;list-style-type:none;margin:0 auto 20px;padding:0;text-align:center"><li style="display:inline-block;height:60px;padding:10px 3px;width:5%;background-color:#fff;color:#542791;font-size:30px;font-family:OpenSansHebrew-Bold;vertical-align:top">2<li style="background-color:#c1a8da;display:inline-block;vertical-align:top;height:60px;padding:10px 3px;width:78%;text-align:right">רמת אי-השוויון (מדד ג\'יני ברוטו)<br><span style=background-color:#e9e0f2;display:block>0.4 |2018   0.42| 2017</span><li style="background-color:#c1a8da;display:inline-block;vertical-align:top;height:60px;padding:20px 3px;width:5%">0.47<li style="background-color:#c1a8da;display:inline-block;vertical-align:top;height:60px;padding:20px 3px;width:5%">0.44<li style="background-color:#c1a8da;display:inline-block;vertical-align:top;height:60px;padding:10px 3px;width:5%"><a href=#><img src=arrow.png style="margin:0 auto"></a></ul><ul style="background-color:#c1a8da;clear:both;float:none;list-style-type:none;margin:0 auto 20px;padding:0;text-align:center"><li style="display:inline-block;height:60px;padding:10px 3px;width:5%;background-color:#fff;color:#542791;font-size:30px;font-family:OpenSansHebrew-Bold;vertical-align:top">3<li style="background-color:#c1a8da;display:inline-block;vertical-align:top;height:60px;padding:10px 3px;width:78%;text-align:right">רמת אי-השוויון (מדד ג\'יני ברוטו)<br><span style=background-color:#e9e0f2;display:block>0.4 |2018   0.42| 2017</span><li style="background-color:#c1a8da;display:inline-block;vertical-align:top;height:60px;padding:20px 3px;width:5%">0.47<li style="background-color:#c1a8da;display:inline-block;vertical-align:top;height:60px;padding:20px 3px;width:5%">0.44<li style="background-color:#c1a8da;display:inline-block;vertical-align:top;height:60px;padding:10px 3px;width:5%"><a href=#><img src=arrow.png style="margin:0 auto"></a></ul></div></div></div></div>';
}

function table2(){
    var html = $('#template-table2').html();
    return html;
    //return '<div class=main_wrapper style=color:#000;direction:rtl;font-family:OpenSansHebrew-Regular;text-align:right;font-size:1.5em><div class="clearfix container"><div class=row><h3 style=font-family:OpenSansHebrew-Bold>מדדים מרכזיים לשנת 2016 - משרד האוצר</h3><div class="content_area table-responsive"><table><tr style=font-size:18px><th style=width:35%;text-align:right;color:#542791;font-size:24px;padding:10px>מדדי תוצאה:<th style=width:10%;text-align:center;padding:10px>ערך 5102<th style=width:10%;text-align:center;padding:10px>Q2<th style=width:10%;text-align:center;padding:10px>Q4<th style=width:10%;text-align:center;padding:10px>מועד סיום<th style=width:10%;text-align:center;padding:10px>ערך במועד<th style=visibility:hidden;width:5%;padding:10px>*<tr style=background-color:#c1a8da;font-size:18px><td style=width:35%;text-align:right;padding:10px><strong>הכנסות המדינה</strong> (מיליארדי₪)<td style=width:10%;text-align:center;padding:10px>296.5<td style=width:10%;text-align:center;padding:10px>-<td style=width:10%;text-align:center;padding:10px>312.3<td style=width:10%;text-align:center;padding:10px>12/2016<td style=width:10%;text-align:center;padding:10px>-<td style=width:5%;text-align:center;padding:10px><a href=# style=color:#542791><i class="fa fa-refresh"></i></a><tr style=background-color:#e9e0f2;font-size:18px><td style=width:35%;text-align:right;padding:10px><strong>שיעור הגרעון</strong><td style=width:10%;text-align:center;padding:10px>2.9%<td style=width:10%;text-align:center;padding:10px>-<td style=width:10%;text-align:center;padding:10px>2.9%<td style=width:10%;text-align:center;padding:10px>12/2021<td style=width:10%;text-align:center;padding:10px>1.5%<td style=width:5%;text-align:center;padding:10px><a href=# style=color:#542791><i class="fa fa-refresh"></i></a></table></div></div></div></div>';
}

function coverPage(){
    var html = $('#template-coverpage')[0].outerHTML;
    //console.log(html);
    return html;
    //return '<div class=main_wrapper style=color:#000;direction:rtl;font-family:OpenSansHebrew-Regular;text-align:left;font-size:1.5em><div class="clearfix container"><div class=row><div class=content_area style="background:url(bg.png) no-repeat top left;text-align:left;padding-left:50px"><h3 style="font-family:OpenSansHebrew-ExtraBold;margin:0 auto;padding-top:65px">משרד האוצר</h3><p style=color:#542791;font-family:OpenSansHebrew-Bold;font-size:16px>תכנית עבודה לשנת 2016<div style=margin-top:100px><p style=margin-bottom:0>שר האוצר <strong style=color:#542791>משה כחלון</strong><p style=margin-bottom:0>מנכ"ל <strong style=color:#542791>שי באב״ד</strong></div></div></div></div><div class=main style=color:#fff;background-color:#542791;font-family:OpenSansHebrew-ExtraBold;position:relative><h1 style="text-align:right;font-size:300px;padding:1em 0">2016</h1></div></div>';
}