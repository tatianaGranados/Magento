Create a new	table clothing_materials with 3
columns: material_id, material,	count.	
Fill it	with data: coton,wool,linen,viscose. All counts set to 0.
Do with Install/Upgrade scripts.

Now create an attribute clothing_material, type select, scope global, filterable in layered navigation.
Add this attribute to the “Top” attribute set (explore Magento/Eav/Api folder to find the right interfaces for that).
Source model should take values from the table. Create backend model which will update count field in the table every time attribute is	saved.
