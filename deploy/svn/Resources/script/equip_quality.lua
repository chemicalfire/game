local cfg={['1']={['property_id_weights']='1|100^2|100^3|100^4|100',['property_num']=1,['quality']=1,['skill_num_weights']='0|100',['skill_id_weights']='0|100',},['3']={['property_id_weights']='1|100^2|100^3|100^4|100',['property_num']=3,['quality']=3,['skill_num_weights']='0|100',['skill_id_weights']='0|100',},['2']={['property_id_weights']='1|100^2|100^3|100^4|100',['property_num']=2,['quality']=2,['skill_num_weights']='0|100',['skill_id_weights']='0|100',},['5']={['property_id_weights']='1|100^2|100^3|100^4|100',['property_num']=4,['quality']=5,['skill_num_weights']='1|100^2|50^3|1',['skill_id_weights']='1|100^2|100^3|100^4|100^5|100',},['4']={['property_id_weights']='1|100^2|100^3|100^4|100',['property_num']=4,['quality']=4,['skill_num_weights']='0|100',['skill_id_weights']='0|100',},}

if GameConfig ~= nil and GameConfig.addSingleConfig ~= nil then
    GameConfig:addSingleConfig('%s',cfg)
end
return cfg