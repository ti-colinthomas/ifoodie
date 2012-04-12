select o.orderid, o.date, t.tableName from `order` as o , `table` as t, `itemorder` as io 
    where o.orderid = io.orderid and
          t.tableid = io.tableid and
          status = 'open'  ;


select * from `order`;
select * from `table`;
select * from `itemorder`;

select orderid from `itemorder` ;

select orderid,sum(quantity) as "Total Order",
        (select t.tablename from `table` as t where t.tableid = io.tableid)
        from `itemorder` as io 
        group by orderid;
        

select orderid,sum(quantity) as "Total Order", t.tablename, o.oderdate
        from `itemorder` as io , `table` as t 
        where t.tableid = io.tableid
        group by orderid;
          
          
          