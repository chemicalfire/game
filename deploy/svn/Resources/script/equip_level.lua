local cfg={['1']={['equip_level']=1,['property_max_value']=20.0,['property_min_value']=10.0,},['3']={['equip_level']=3,['property_max_value']=40.0,['property_min_value']=30.0,},['2']={['equip_level']=2,['property_max_value']=30.0,['property_min_value']=20.0,},['4']={['equip_level']=4,['property_max_value']=50.0,['property_min_value']=40.0,},}

if GameConfig ~= nil and GameConfig.addSingleConfig ~= nil then
    GameConfig:addSingleConfig('%s',cfg)
end
return cfg