local cfg={['1']={['monster_id']=1,['monster_name']='小火龙',},['3']={['monster_id']=3,['monster_name']='哥布林',},['2']={['monster_id']=2,['monster_name']='蜘蛛',},['5']={['monster_id']=5,['monster_name']='石巨人',},['4']={['monster_id']=4,['monster_name']='骷髅战士',},}

if GameConfig ~= nil and GameConfig.addSingleConfig ~= nil then
    GameConfig:addSingleConfig('%s',cfg)
end
return cfg