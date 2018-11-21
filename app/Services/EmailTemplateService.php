<?php

namespace App\Services;

use Validator;
use Session;
use DB;
use Input;
use App\models\EmailTemplate;

class EmailTemplateService {
    /*
     * Get Email Template By ID
     */

    public function emailTemplateById($id) {
        try {
            $template = $htmlContent = '
    <html>
    <head>
        <title>Welcome to The Academic Writer</title>
    </head>
    <body>
        <h1>Thanks you for trusting on us!</h1>
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 300px; height: 200px;">
            <tr>
                <th>Name:</th><td></td>
            </tr>
            <tr style="background-color: #e0e0e0;">
                <th>Email:</th><td><a href="mailto:info@themidterm.com">info@themidterm.com</a></td>
            </tr>
            <tr>
                <th>Website:</th><td><a href="http://youracademicwriter.com">http://youracademicwriter.com</a></td>
            </tr>
        </table>
    </body>
    </html>';
            
            return $template;
        } catch (\Exception $ex) {
            //dd($ex);
            return false;
        }
    }
    
    /*
     * Get Email Template By Name
     */
    public function emailTemplateByName($name, $lang) {
        try {
            $template = DB::table('email_templates')
                    ->leftJoin('emailtemplates_tr', 'emailtemplates_tr.email_templates_id', '=', 'email_templates.id')
                    ->leftJoin('languages', 'languages.id', '=', 'emailtemplates_tr.languages_id')
                    ->select('email_templates.id as template_id', 'email_templates.*', 'emailtemplates_tr.*')
                    ->where('emailtemplates_tr.name', 'LIKE', '%'.$name.'%')
                    ->where('languages.locale', $lang)
                    ->first();
            
            return $template;
        } catch (\Exception $ex) {
            //dd($ex);
            return false;
        }
    }

}
