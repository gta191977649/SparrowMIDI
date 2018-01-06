@extends('layouts.app')

@section('content')
    <h1 class="text-primary">关于{{ config('app.name', 'Laravel') }}</h1>
    <hr/>
    <p><strong>{{ config('app.name', 'Laravel') }}</strong> 是一个开源的MIDI分享与管理系统。</p>
    <h2>由来</h2>
    <p>这个系统最早是由Episodes在2013年所开发的，但是因为旧系统数据库代码设计的问题，导致代码只能运行于PHP5.x, 你现在看到的版本是旧版本的一个重大的代码重构，支援PHP7.x并且使用Laravel框架开发。</p>
    <h2>现在</h2>
    <p>本系统由Project-Sparrow维护，Project-Sparrow是Episodes参与开发过的所有项目的名称。</p>
    <h2>开源</h2>
    <p>本项目全部代码都是开源的，并基于开源协议GPLv3公开，如果你想改进本项目，欢迎前往Github去fork本项目。</p>
    
    <h2>源码地址</h2>
    <p><a href="https://github.com/PrpjectSparrow/SparrowMIDI">https://github.com/PrpjectSparrow/SparrowMIDI</a></p>
    <h2>作者博客</h2>
    <p><a href="http://blog.sparrow.moe">http://blog.sparrow.moe</a></p>
@endsection
