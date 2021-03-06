<div class="row" style="margin-bottom: 10px;">
    <div class="col-md-5">
        <h2 class="stat_field"><small>Name:</small> {{ $character->name }}</h2>
    </div>
    <div class="col-md-7" style="margin-top: 12px;">
        <div class="row">
            <div class="col-xs-4">
                <div class="stat_field"><small>Level &amp; Class:</small> <span v-text="stats.level"></span> <span v-text="stats.class"></span></div>
            </div>
            <div class="col-xs-4">
                <div class="stat_field"><small>Background:</small> <span v-text="stats.background"></span></div>
            </div>
            <div class="col-xs-4">
                <div class="stat_field"><small>Player:</small> {{ $character->user->name }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <div class="stat_field"><small>Race:</small> <span v-text="stats.race"></span></div>
            </div>
            <div class="col-xs-4">
                <div class="stat_field"><small>Alignment:</small> <span v-text="stats.alignment"></span></div>
            </div>
            <div class="col-xs-4">
                <div class="stat_field"><small>Campaign:</small> {{ $character->campaign->name or '' }}</div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="col-md-3 stats">
            Strength
            <div class="panel panel-default">
                <div class="panel-body">
                    <span v-text="stats.strength"></span>
                </div>
                <div class="panel-footer" v-text="stats.str"></div>
            </div>
            Dexterity
            <div class="panel panel-default">
                <div class="panel-body">
                    <span v-text="stats.dexterity"></span>
                </div>
                <div class="panel-footer" v-text="stats.dex"></div>
            </div>
            Constitution
            <div class="panel panel-default">
                <div class="panel-body">
                    <span v-text="stats.constitution"></span>
                </div>
                <div class="panel-footer" v-text="stats.con"></div>
            </div>
            Intellegence
            <div class="panel panel-default">
                <div class="panel-body">
                    <span v-text="stats.intellegence"></span>
                </div>
                <div class="panel-footer" v-text="stats.int"></div>
            </div>
            Wisdom
            <div class="panel panel-default">
                <div class="panel-body">
                    <span v-text="stats.wisdom"></span>
                </div>
                <div class="panel-footer" v-text="stats.wis"></div>
            </div>
            Charisma
            <div class="panel panel-default">
                <div class="panel-body">
                    <span v-text="stats.charisma"></span>
                </div>
                <div class="panel-footer" v-text="stats.cha"></div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Proficiency Bonus</h3>
                </div>
                <div class="panel-body" v-text="stats.proficiency"></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Saving Throws</h3>
                </div>
                <div class="panel-body custom-rc">
                    <input type="checkbox" name="str_save" v-model="checkProficiency(raw.str_save)">
                    <label for="str_save">
                        <span class="stat_field" v-text="stats.str_save"></span> Strength
                    </label>
                    <input type="checkbox" name="dex_save" v-model="checkProficiency(raw.dex_save)">
                    <label for="dex_save">
                        <span class="stat_field" v-text="stats.dex_save"></span> Dexterity
                    </label>
                    <input type="checkbox" name="con_save" v-model="checkProficiency(raw.con_save)">
                    <label for="con_save">
                        <span class="stat_field" v-text="stats.con_save"></span> Constitution
                    </label>
                    <input type="checkbox" name="int_save" v-model="checkProficiency(raw.int_save)">
                    <label for="int_save">
                        <span class="stat_field" v-text="stats.int_save"></span> Intellegence
                    </label>
                    <input type="checkbox" name="wis_save" v-model="checkProficiency(raw.wis_save)">
                    <label for="wis_save">
                        <span class="stat_field" v-text="stats.wis_save"></span> Wisdom
                    </label>
                    <input type="checkbox" name="cha_save" v-model="checkProficiency(raw.cha_save)">
                    <label for="cha_save">
                        <span class="stat_field" v-text="stats.cha_save"></span> Charisma
                    </label >
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Skills</h3>
                </div>
                <div class="panel-body custom-rc">
                    <input type="checkbox" name="acrobatics" v-model="checkProficiency(raw.acrobatics)">
                    <label for="acrobatics">
                        <span class="stat_field" v-text="stats.acrobatics"></span> Acrobatics
                    </label>
                    <input type="checkbox" name="animal_handling" v-model="checkProficiency(raw.animal_handling)">
                    <label for="animal_handling">
                        <span class="stat_field" v-text="stats.animal_handling"></span> Animal Handling
                    </label>
                    <input type="checkbox" name="arcana" v-model="checkProficiency(raw.arcana)">
                    <label for="arcana">
                        <span class="stat_field" v-text="stats.arcana"></span> Arcana
                    </label>
                    <input type="checkbox" name="athletics" v-model="checkProficiency(raw.athletics)">
                    <label for="athletics">
                        <span class="stat_field" v-text="stats.athletics"></span> Athletics
                    </label>
                    <input type="checkbox" name="deception" v-model="checkProficiency(raw.deception)">
                    <label for="deception">
                        <span class="stat_field" v-text="stats.deception"></span> Deception
                    </label>
                    <input type="checkbox" name="history" v-model="checkProficiency(raw.history)">
                    <label for="history">
                        <span class="stat_field" v-text="stats.history"></span> History
                    </label>
                    <input type="checkbox" name="insight" v-model="checkProficiency(raw.insight)">
                    <label for="insight">
                        <span class="stat_field" v-text="stats.insight"></span> Insight
                    </label>
                    <input type="checkbox" name="intimidation" v-model="checkProficiency(raw.intimidation)">
                    <label for="intimidation">
                        <span class="stat_field" v-text="stats.intimidation"></span> Intimidation
                    </label>
                    <input type="checkbox" name="investigation" v-model="checkProficiency(raw.investigation)">
                    <label for="investigation">
                        <span class="stat_field" v-text="stats.investigation"></span> Investigation
                    </label>
                    <input type="checkbox" name="medicine" v-model="checkProficiency(raw.medicine)">
                    <label for="medicine">
                        <span class="stat_field" v-text="stats.medicine"></span> Medicine
                    </label>
                    <input type="checkbox" name="nature" v-model="checkProficiency(raw.nature)">
                    <label for="nature">
                        <span class="stat_field" v-text="stats.nature"></span> Nature
                    </label>
                    <input type="checkbox" name="perception" v-model="checkProficiency(raw.perception)">
                    <label for="perception">
                        <span class="stat_field" v-text="stats.perception"></span> Perception
                    </label>
                    <input type="checkbox" name="performance" v-model="checkProficiency(raw.performance)">
                    <label for="performance">
                        <span class="stat_field" v-text="stats.performance"></span> Performance
                    </label>
                    <input type="checkbox" name="persuasion" v-model="checkProficiency(raw.persuasion)">
                    <label for="persuasion">
                        <span class="stat_field" v-text="stats.persuasion"></span> Persuasion
                    </label>
                    <input type="checkbox" name="religion" v-model="checkProficiency(raw.religion)">
                    <label for="religion">
                        <span class="stat_field" v-text="stats.religion"></span> Religion
                    </label>
                    <input type="checkbox" name="sleight_of_hand" v-model="checkProficiency(raw.sleight_of_hand)">
                    <label for="sleight_of_hand">
                        <span class="stat_field" v-text="stats.slight_of_hand"></span> Sleight Of Hand
                    </label>
                    <input type="checkbox" name="stealth" v-model="checkProficiency(raw.stealth)">
                    <label for="stealth">
                        <span class="stat_field" v-text="stats.stealth"></span> Stealth
                    </label>
                    <input type="checkbox" name="survival" v-model="checkProficiency(raw.survival)">
                    <label for="survival">
                        <span class="stat_field" v-text="stats.survival"></span> Survival
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">AC</h3>
                    </div>
                    <div class="panel-body text-center" v-text="stats.ac"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Initiative</h3>
                    </div>
                    <div class="panel-body text-center" v-text="stats.dex"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Speed</h3>
                    </div>
                    <div class="panel-body text-center" v-text="stats.speed"></div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Hit Points</h3>
            </div>
            <div class="panel-body">
                <!-- Current Hit Points Form Input -->
                <div class="form-group">
                    <label for="current" class="control-label">Current Hit Points</label>
                    <div class="input-group input-group-sm">
                        <input type="text" name="current" class="form-control" v-model="stats.hp_current" />
                        <span class="input-group-addon" v-text=" '/ ' + stats.hp_max "></span>
                    </div>
                </div>
                <!-- Temporary Hit Points Form Input -->
                <div class="form-group">
                    <label for="temporary" class="control-label">Temporary Hit Points</label>
                    <input type="text" name="temporary" class="form-control input-sm" v-model="stats.hp_temp" />
                </div>
                <!-- Hit Die Form Input -->
                <div class="form-group" style="margin-bottom: 0">
                    <label class="control-label">Hit Die</label>
                    <span class="form-static-control pull-right" v-text="stats.hp"></span>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Death Saves</h3>
            </div>
            <div class="panel-body">
                Success:
                <div class="custom-rc clickable inline text-center"> <!-- style="margin-top:0;"> -->
                    <input type="checkbox" name="success_1"><label for="success_1"></label>
                    <input type="checkbox" name="success_2"><label for="success_2"></label>
                    <input type="checkbox" name="success_3"><label for="success_3"></label>
                </div>
                Failures:
                <div class="custom-rc clickable inline text-center"> <!-- style="margin-top:0;"> -->
                    <input type="checkbox" name="fail_1"><label for="fail_1"></label>
                    <input type="checkbox" name="fail_2"><label for="fail_2"></label>
                    <input type="checkbox" name="fail_3"><label for="fail_3"></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Proficiencies</h3>
                </div>
                <div class="panel-body">
                    <!-- Proficiencies Form Input -->
                    <div class="form-group">
                        <textarea name="proficiencies" rows="12" class="form-control" v-model="stats.proficiencies" style="max-width: 100%"></textarea>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Inspiration</h3>
            </div>
            <div class="panel-body">
                <!-- Inspiration Form Input -->
                <div class="form-group">
                    <!-- <label for="inspiration" class="control-label">Inspiration</label> -->
                    <div class="input-group input-group-sm">
                        <input type="text" name="inspiration" class="form-control" v-model="stats.inspiration" />
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-minus"></i></button>
                            <button type="button" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Weapons</h3>
            </div>
            <div class="panel-body" style="max-height: 50vh;overflow-y: auto;">
                <!-- Weapon Form Input -->
                <div class="form-group">
                    <input type="text" name="weapon" class="form-control input-sm" placeholder="Search"/>
                </div>
                <div class="list-group">
                    @if($character->weapons->count() > 0)
                            @foreach($character->weapons as $key => $item)
                                <div class="list-group-item">
                                    {{ $item->name }}
                                </div>
                            @endforeach
                    @else
                        <div class="list-group-item">
                            No Weapons to display.
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Items</h3>
            </div>
            <div class="panel-body" style="max-height: 50vh;overflow-y: auto;">
                <!-- Item Form Input -->
                <div class="form-group">
                    <input type="text" name="item" class="form-control input-sm" placeholder="Search"/>
                </div>
                <div class="list-group">
                    @if($character->notWeapons->count() > 0)
                        @foreach($character->notWeapons as $key => $item)
                            <div class="list-group-item">
                                {{ $item->name }}
                                <small class="pull-right">{{ $item->pivot->quantity }}{{ ' ' + $item->pivot->unit or ''}}</small>
                            </div>
                        @endforeach
                    @else
                        <div class="list-group-item">
                            No Items to display.
                        </div>
                    @endif
                </div>
            </div>
            <div class="panel-footer text-center">
                cp: <span v-text="stats.cp"></span> |
                sp: <span v-text="stats.sp"></span> |
                ep: <span v-text="stats.ep"></span> |
                gp: <span v-text="stats.gp"></span> |
                pp: <span v-text="stats.pp"></span>
            </div>
        </div>
    </div>
</div>

@section('inventory')
    <div class="row">
        <div class="col-md-2">
            <h4>Currency</h4>
            <!-- Cp Form Input -->
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="cp" class="form-control" v-model="stats.cp" />
                    <div class="input-group-addon">CP</div>
                </div>
            </div>
            <!-- Sp Form Input -->
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="sp" class="form-control" v-model="stats.sp" />
                    <div class="input-group-addon">SP</div>
                </div>
            </div>
            <!-- Ep Form Input -->
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="ep" class="form-control" v-model="stats.ep" />
                    <div class="input-group-addon">EP</div>
                </div>
            </div>
            <!-- Gp Form Input -->
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="gp" class="form-control" v-model="stats.gp" />
                    <div class="input-group-addon">GP</div>
                </div>
            </div>
            <!-- Pp Form Input -->
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="pp" class="form-control" v-model="stats.pp" />
                    <div class="input-group-addon">PP</div>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            @each('partials._item', $character->items, 'item')
        </div>
    </div>
@endsection