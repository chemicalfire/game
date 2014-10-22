local cfg={['property']={['tbl_cn']='属性',['tbl_en']='property',},['career']={['tbl_cn']='职业',['tbl_en']='career',},['guards']={['tbl_cn']='关卡',['tbl_en']='guards',},['equip_level']={['tbl_cn']='装备品阶',['tbl_en']='equip_level',},['equip']={['tbl_cn']='装备',['tbl_en']='equip',},['skill']={['tbl_cn']='技能',['tbl_en']='skill',},['equip_quality']={['tbl_cn']='装备品质',['tbl_en']='equip_quality',},['monsters']={['tbl_cn']='怪物',['tbl_en']='monsters',},}

if GameConfig ~= nil and GameConfig.addSingleConfig ~= nil then
    GameConfig:addSingleConfig('%s',cfg)
end
return cfg