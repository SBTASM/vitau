<?php

namespace console\controllers;

use common\models\Category;
use common\models\Gratter;
use darkdrim\simplehtmldom\simple_html_dom_node;
use darkdrim\simplehtmldom\SimpleHTMLDom;
use Exception;
use yii\console\Controller;

class ParserController extends Controller
{
    /** Import gratters
     * @param $url
     * @param $category_name
     */
    protected $categories = [
        '1' => 'День народження',
        '5' => 'Побажання та поздоровлення',
        '25' => 'Весілля',
        '126' => 'Річниця одруження',
        '124' => 'Для закоханих',
        '59' => 'Тости',
        '127' => 'Релігійні привітання',
        '128' => 'Новосілля',
        '129' => 'Школа',
        '130' => 'Новонародженим',
        '7' => 'Новий рік',
        '8' => 'Різдво(православне)',
        '13' => 'Колядки',
        '12' => 'Щедрівки',
        '23' => 'Старий Новий рік',
        '51' => 'День соборності україни',
        '26' => 'День Святого Валентина',
        '31' => 'День рідної мови',
        '24' => 'День захисника Вітчизни',
        '71' => 'День землевпорядника',
        '6' => '8 березня',
        '32' => 'Шевяенківський день',
        '72' => 'День споживача',
        '73' => 'День комунальника',
        '69' => 'День культури',
        '33' => 'День СБУ',
        '74' => 'День МВС України',
        '75' => 'День театру',
        '76' => 'День геолога',
        '34' => 'День сміху',
        '77' => 'День здоров\'я',
        '35' => 'День космонавтики',
        '70' => 'День пам\'яток ысторії',
        '78' => 'День довкілля',
        '2' => 'Великдень',
        '4' => '1 травня',
        '79' => 'День свободи преси',
        '3' => 'День перемоги - 9 Травня',
        '80' => 'День матері',
        '81' => 'День сім\'ї',
        '84' => 'День електрозв\'язку',
        '82' => 'День науки',
        '83' => 'День Європи',
        '85' => 'День музеїв',
        '64' => 'День банкіра',
        '68' => 'День слов\'янскої культури',
        '88' => 'День хіміка',
        '49' => 'День прикордонника',
        '87' => 'День миротворців',
        '86' => 'День поліграфії',
        '90' => 'День водного господарства',
        '53' => 'День захисту дітей',
        '89' => 'День охорони природи',
        '66' => 'День журналіста',
        '91' => 'День легкої промисловості',
        '92' => 'День медика',
        '93' => 'День держслужби',
        '95' => 'День молоді',
        '65' => 'День митної служби',
        '11' => 'День конституції України',
        '96' => 'День архітектури',
        '123' => 'День кооперації',
        '38' => 'День податківців',
        '97' => 'День флоту',
        '52' => 'День ППО',
        '98' => 'День рибалки',
        '14' => 'День бугалтера',
        '100' => 'День металурга',
        '28' => 'День сисадміна',
        '16' => 'День працівників торгівлі',
        '42' => 'День ВМС',
        '43' => 'День аеромобільних війск',
        '40' => 'День військ зв\'язку',
        '18' => 'День будівельника',
        '44' => 'День ветеринара',
        '101' => 'День бджолярства',
        '39' => 'Яблучний Спас',
        '10' => 'День незалежності України',
        '30' => 'День авіації',
        '29' => 'День шахтаря',
        '15' => 'День знань',
        '21' => 'День підприємця',
        '54' => 'День програміста',
        '102' => 'День спорту',
        '103' => 'День кінематографії',
        '27' => 'День нафтовика',
        '41' => 'День танкіста',
        '55' => 'День рятувальника',
        '104' => 'День фармацевта',
        '105' => 'День винахідника',
        '56' => 'День працівника лісу',
        '106' => 'День партизанів',
        '57' => 'День туризму',
        '58' => 'День машинобудування',
        '22' => 'День бібліотекаря',
        '125' => 'Різне',
        '107' => 'День музики',
        '45' => 'День ветеранів',
        '36' => 'День освітян',
        '37' => 'День юриста',
        '109' => 'День стандартизації',
        '108' => 'День художника',
        '94' => 'День епідеміолого',
        '46' => 'День козака',
        '110' => 'День харчпрому',
        '111' => 'День автомобіліста',
        '60' => 'День робітника соцсфери',
        '47' => 'День інженерних військ',
        '48' => 'День артилериста',
        '17' => 'День залізничника',
        '112' => 'День української мови',
        '62' => 'День телебачення і радіо',
        '61' => 'День сільгосподарства',
        '20' => 'День студента',
        '113' => 'День метеоролога',
        '114' => 'День телебачення',
        '67' => 'День свободи',
        '115' => 'День прокуратури',
        '116' => 'День інвалідів',
        '19' => 'День Збройних Сил України',
        '117' => 'День самоврядування',
        '118' => 'День прав людини',
        '50' => 'День сухопутних військ',
        '119' => 'День суду',
        '120' => 'День адвокатури',
        '121' => 'День міліції',
        '63' => 'День енергетика',
        '122' => 'День дипломатії',
        '99' => 'День архівів',
        '9' => 'Різдво (католицьке)',
    ];
    public function actionIndex(){

        $dirs_raw = scandir("C:\\OpenServer\\domains\\vitau.dev\\greetings");
        $dirs = array();
        foreach ($dirs_raw as $dir){
            if(is_dir("C:\\OpenServer\\domains\\vitau.dev\\greetings\\$dir")) $dirs[] = $dir;
        }

        unset($dirs[0]); unset($dirs[1]);

        $files = array();
        foreach($dirs as $dir){
            try{
                $files[] = scandir("C:\\OpenServer\\domains\\vitau.dev\\greetings\\$dir");
            }catch(Exception $e){
                echo "Error dir: '$dir'! Skipping...\n";

            }
        }

        foreach ($files as $file_s){
            unset($file_s[0]); unset($file_s[0]);
        }

        $count = count($files);
        for($i = 0; $i < $count; $i++){
            unset($files[$i][0]); unset($files[$i][1]);
        }

        echo "Detected dirs " . count($dirs) . ".\n";

        $dirs_count = count($dirs);
        for ($i = 0, $j = 2; $i < $dirs_count; $i++, $j++){

            echo "Entry directory: '$dirs[$j]' Files count: " . count($files[$i]) . ".\n";

            $data = $this->parser($dirs[$j], $files[$i]);
        }
    }
    private function saveData($category_name, $data, $id = NULL){
        $category = new Category([
            'title' => $category_name,
            'id' => $id
        ]);
        echo "Saving new category...";
        try{
            $category->save();
            echo "Ok\n";
        }catch(\yii\base\Exception $e){
            echo "\n\n". $e->getMessage() ."\n\n";
            echo "Error! Skipping...\n";
            return ;
        }
        $category_id = $category->id;

        $counter = 0;
        foreach ($data as $items){
            foreach ($items as $item){

                $transaction = \Yii::$app->db->beginTransaction();

                $g = new Gratter();
                $g->text = $item;
                $g->category_id = $category_id;
                $g->created_at = date("d.m.Y - H:i:s");
                $g->updated_at = $g->created_at;

                echo "Saving gratter...";
                if($g->save()){ echo "Ok. ID = $g->id\n"; $counter++;  $transaction->commit(); }
                else{
                    echo "Fail!\n";
                    $transaction->rollBack();
                }
            }
        }

        echo "$counter graters saved complete.\n";
    }
    private function parser($dir, $files, $save_data = true){
        $result = array();
        $counter = 0;
        $category_name = $this->getCategoryName($dir);


        if(is_null($category_name)) die('End');

        foreach($files as $file){
            $url = "C:\\OpenServer\\domains\\vitau.dev\\greetings\\$dir\\$file";
            $data = '';
            try{
                $data = file_get_contents($url);
            }catch(Exception $e){
                echo "File '$file' not found. Skipping...\n";
                return NULL;
            }

            if(is_null($data)){ echo "Error in page $url."; break; }
            $encoded = mb_convert_encoding($data, 'UTF-8', 'windows-1251');
            $data = SimpleHTMLDom::str_get_html($encoded);

            /**
             * @var simple_html_dom_node[] $greatings
             */
            $greatings = $data->getElementsById(".greeting");
            if(count($greatings) !== 0){
                echo "Parsing on '$url'...";
                echo count($greatings) . " loaded.\n";
            }
            $counter += count($greatings);

            /**
             * @var simple_html_dom_node[] $items
             */
            $items = array();
            foreach ($greatings as $greating){
                $items[] = $greating->getElementByTagName("p");
            }

            $data = array();
            foreach ($items as $item){
                $data[] = $item->innertext();
            }

            $result[] = $data;
        }
        echo "$counter parsed complete\n";
        if($save_data === true) $this->saveData($category_name, $result, $dir);
    }
    private function getCategoryName($dir){
        return $this->categories[$dir];
    }
}
