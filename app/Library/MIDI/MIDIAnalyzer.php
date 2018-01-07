<?php

namespace App\Library;

//宏定义 ...
define("PROGRAM_NUMBER",0xC);
define("SOUND_MAP_DRUM",0xA);


class MIDIAnalyzer{

    private $mididata = null;
    //构造函数
    function __construct($filename) 
    {
        //构造函数赋值..
        $this->mididata = file_get_contents($filename);
    }
    //获取乐器
    public function getInstrumentMap()
    {   
        //获取MIDI Track
        $midi = new IOMIDI();
        $midi->parse($this->mididata);
        $tracks = $midi->tracks;
        
        //构造输出数组
        $midiInfo = array();

        //读取MIDI信息，坑爹的foreach
        $idx = 0;
        foreach ($tracks as  $track )
        {
            $var = 0;
            foreach ($track['track'] as $track_dump) 
            {
            
                if(isset($track_dump['MetaEventData']) && $var == 0)
                {
                    $tem = array("TruckName" =>  iconv("GBK", "UTF-8", $track_dump['MetaEventData']),"ProgramNumber" => 0 );
                    array_push($midiInfo, $tem);
                    $var = 1;
                }	
                if($track_dump['EventType'] == 0xC && ($var == 0 || $var == 1))
                {	
                    if($track_dump['MIDIChannel'] == SOUND_MAP_DRUM) $midiInfo[$idx]["ProgramNumber"]  = "DRUM";
                    else $midiInfo[$idx]["ProgramNumber"] = IO_MIDI_GM::getProgramName($track_dump['ProgramNumber']);
                    break;
                }	
            }
        
            $idx++;
        }
        return $midiInfo;

    }
    public function getHeader()
    {
        $midi = new IOMIDI();
      
        $midi->parse($this->mididata);
        return $midi->header['header'];
    }
}