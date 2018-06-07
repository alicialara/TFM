<?php
/**
 * Created by PhpStorm.
 * User: alicia
 * Date: 4/19/2017
 * Time: 09:14
 */
?>
@extends('layouts.dashboard')
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Menú</div>
                <div class="panel-body">
                    {!! Form::open(array('url' => 'encuestas')) !!}

                    {{ Form::token() }}
                    {{ Form::hidden('page',$page) }}
                    <fieldset>
                        <div class="form-group" id="page_1" style="font-weight: bold;">
                            <div class="row">
                                <div class="col-md-4 col-md-push-4">
                                    <div class="form-group">
                                        <label style="font-size: 19px;" for="edad">Edad: </label>
                                        {!! Form::select('edad',$edad,null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-md-push-4">
                                    <div class="form-group">
                                        <label style="font-size: 19px;" for="estudios">Estudios: </label>
                                        {!! Form::select('estudios',$estudios,null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="text-align: center;margin: 10px auto;">
                                <p style="font-size: 19px;">En general, ¿cuál es su nivel de conocimiento previo sobre las obras del museo?</p>
                            </div>
                            <hr>
                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">Casi nada</td>
                                        <td><label class="radio-inline" for="radios-1"><input type="radio" name="q_1" value="1">1</label></td>
                                        <td><label class="radio-inline" for="radios-2"><input type="radio" name="q_1" value="2">2</label></td>
                                        <td><label class="radio-inline" for="radios-3"><input type="radio" name="q_1" value="3">3</label></td>
                                        <td><label class="radio-inline" for="radios-4"><input type="radio" name="q_1" value="4">4</label></td>
                                        <td><label class="radio-inline" for="radios-5"><input type="radio" name="q_1" value="5">5</label></td>
                                        <td><label class="radio-inline" for="radios-6"><input type="radio" name="q_1" value="6">6</label></td>
                                        <td><label class="radio-inline" for="radios-7"><input type="radio" name="q_1" value="7">7</label></td>
                                        <td class="col-md-4">Soy experto</td>
                                    </tr>
                                </table>
                            </div>
                            <hr>
                            <div class="row" style="text-align: center;margin: 10px auto;">
                                <p style="font-size: 19px;">Las siguientes preguntas evalúan el sistema. Por favor, responda de la forma más espontánea posible, valorando entre 1 y 7 los siguientes parámetros.</p>
                            </div>
                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">Desagradable</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_1' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_1' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_1' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_1' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_1' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_1' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_1' value='7'>7</label></td>

                                        <td class="col-md-4">Agradable</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">Difícil de entender</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_2' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_2' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_2' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_2' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_2' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_2' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_2' value='7'>7</label></td>

                                        <td class="col-md-4">Fácil de entender</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">Creativo</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_3' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_3' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_3' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_3' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_3' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_3' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_3' value='7'>7</label></td>

                                        <td class="col-md-4">No creativo</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">Fácil de aprender</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_4' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_4' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_4' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_4' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_4' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_4' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_4' value='7'>7</label></td>

                                        <td class="col-md-4">Difícil de aprender</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">Con valor</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_5' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_5' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_5' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_5' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_5' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_5' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_5' value='7'>7</label></td>

                                        <td class="col-md-4">Sin valor</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">Aburrido</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_6' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_6' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_6' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_6' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_6' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_6' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_6' value='7'>7</label></td>

                                        <td class="col-md-4">Emocionante</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">No interesante</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_7' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_7' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_7' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_7' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_7' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_7' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_7' value='7'>7</label></td>

                                        <td class="col-md-4">Interesante</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">Impredecible</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_8' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_8' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_8' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_8' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_8' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_8' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_8' value='7'>7</label></td>

                                        <td class="col-md-4">Predecible</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">Rápido</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_9' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_9' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_9' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_9' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_9' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_9' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_9' value='7'>7</label></td>

                                        <td class="col-md-4">Lento</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">Original</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_10' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_10' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_10' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_10' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_10' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_10' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_10' value='7'>7</label></td>

                                        <td class="col-md-4">No original</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">Obstructivo</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_11' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_11' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_11' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_11' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_11' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_11' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_11' value='7'>7</label></td>

                                        <td class="col-md-4">Impulsor de apoyo</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">Bueno</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_12' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_12' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_12' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_12' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_12' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_12' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_12' value='7'>7</label></td>

                                        <td class="col-md-4">Malo</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">Complicado</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_13' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_13' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_13' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_13' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_13' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_13' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_13' value='7'>7</label></td>

                                        <td class="col-md-4">Fácil de usar</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">No atractivo</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_14' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_14' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_14' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_14' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_14' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_14' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_14' value='7'>7</label></td>

                                        <td class="col-md-4">Atractivo</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">Convencional</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_15' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_15' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_15' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_15' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_15' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_15' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_15' value='7'>7</label></td>

                                        <td class="col-md-4">Novedoso</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">Incómodo</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_16' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_16' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_16' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_16' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_16' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_16' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_16' value='7'>7</label></td>

                                        <td class="col-md-4">Cómodo</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">Seguro</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_17' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_17' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_17' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_17' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_17' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_17' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_17' value='7'>7</label></td>

                                        <td class="col-md-4">Inseguro</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">Activador</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_18' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_18' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_18' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_18' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_18' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_18' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_18' value='7'>7</label></td>

                                        <td class="col-md-4">Adormecedor</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">Cubre expectativas</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_19' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_19' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_19' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_19' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_19' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_19' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_19' value='7'>7</label></td>

                                        <td class="col-md-4">No cubre expectativas</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">Ineficiente</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_20' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_20' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_20' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_20' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_20' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_20' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_20' value='7'>7</label></td>

                                        <td class="col-md-4">Eficiente</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">Claro</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_21' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_21' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_21' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_21' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_21' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_21' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_21' value='7'>7</label></td>

                                        <td class="col-md-4">Confuso</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">No pragmático</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_22' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_22' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_22' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_22' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_22' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_22' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_22' value='7'>7</label></td>

                                        <td class="col-md-4">Pragmático</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">Ordenado</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_23' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_23' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_23' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_23' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_23' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_23' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_23' value='7'>7</label></td>

                                        <td class="col-md-4">Sobrecargado</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">Atractivo</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_24' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_24' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_24' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_24' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_24' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_24' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_24' value='7'>7</label></td>

                                        <td class="col-md-4">Feo</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">Simpático</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_25' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_25' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_25' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_25' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_25' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_25' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_25' value='7'>7</label></td>

                                        <td class="col-md-4">Antipático</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tr style="text-align:center;">
                                        <td class="col-md-4">Conservador</td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_26' value='1'>1</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_26' value='2'>2</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_26' value='3'>3</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_26' value='4'>4</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_26' value='5'>5</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_26' value='6'>6</label></td>
                                        <td><label class="radio-inline" for="radios"><input type="radio" name='ux_26' value='7'>7</label></td>

                                        <td class="col-md-4">Innovador</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="form-group" id="page_2" style="font-weight:bold;font-size: 19px;text-align: center;">

                            <div class="form-group">
                                <label>¿Qué es lo que más te ha gustado de este sistema y por qué?</label>
                                {{ Form::textarea('oa_1', null, array('class' => 'form-control', 'style' => 'height:150px')) }}
                            </div>
                            <div class="form-group">
                                <label>¿Qué es lo que menos te ha gustado de este sistema y por qué?</label>
                                {{ Form::textarea('oa_2', null, array('class' => 'form-control', 'style' => 'height:150px')) }}
                            </div>

                            <div class="form-group">
                                <label>¿Cómo crees que se podría mejorar el sistema? ¿Te gustaría añadir alguna funcionalidad en concreto?</label>
                                {{ Form::textarea('oa_3', null, array('class' => 'form-control', 'style' => 'height:150px')) }}
                            </div>

                            <hr>
                            <hr>
                            <div class="form-group">
                                {{ Form::submit('Enviar encuesta', array('class' => 'btn btn-success btn-block btn-lg')) }}
                            </div>
                        </div>



                    </fieldset>
                    {!! Form::close() !!}

                    <nav aria-label="Navegacion_encuesta" class="pull-right">
                        <ul class="pagination">
                            <li class="page-link btn btn-lg"><a class="page-link" id="ant" style="font-size: 24px;">Página anterior</a></li>
                            {{--<li class="page-item"><a class="page-link" id="1">1</a></li>--}}
                            {{--<li class="page-item"><a class="page-link" id="2">2</a></li>--}}
                            <li class="page-link btn btn-lg"><a class="page-link" id="sig" style="font-size: 24px;">Siguiente página</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts_datatables')
<script>
    function update_survey(page){
        $('div[id*=page_]').unbind().each(function(){
            var num_page = $(this).attr("id").replace("page_","");
            console.log("Num page:" + num_page);
            if(num_page == page){
                $(this).show();
            }else{
                $(this).hide();
            }
        });
        if(page == 1){
            $('#ant').hide();
            $('#sig').show();
        }else if(page == 2){
            $('#sig').hide();
            $('#ant').show();
        }else{
            $('#sig').show();
            $('#ant').show();
        }
    }
    function update_nav(page){
        $('a[class="page-link"]').unbind().click(function(e){
            e.preventDefault();
            var value = $(this).attr("id");
            if(value == 'ant'){
                if(page==1) page=1;
                else page = parseInt(page)-1;
                $('input[name="page"]').val(page);
                update_data();
            }else if(value == 'sig'){
                if(page==2) page=2;
                else page = parseInt(page) + 1;
                $('input[name="page"]').val(page);
                update_data();
            }else{
                $('input[name="page"]').val(value);
                update_data();
            }
        });
    }
    function update_data(){
        var page = $('input[name="page"]').val();
        console.log("Page:" + page);
        update_survey(page);
        update_nav(page);
    }
    $( document ).ready(function() {
        update_data();
    });
</script>
@endpush
