local cfg={['1']={['skill_id']=1,['skill_name']='会心一击几率增加5%',},['3']={['skill_id']=3,['skill_name']='卓越一击概率增加5%',},['2']={['skill_id']=2,['skill_name']='生命值增加5%',},['5']={['skill_id']=5,['skill_name']='防御力增加5%',},['4']={['skill_id']=4,['skill_name']='攻击力增加5%',},}

if GameConfig ~= nil and GameConfig.addSingleConfig ~= nil then
    GameConfig:addSingleConfig('%s',cfg)
end
return cfg