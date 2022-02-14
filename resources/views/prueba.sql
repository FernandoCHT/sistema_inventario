
DELIMITER //
CREATE TRIGGER `tr_updStockCompra` AFTER INSERT ON `purchase_details`
 FOR EACH ROW BEGIN
 UPDATE products SET stock = stock + NEW.cantidad 
 WHERE products.id = NEW.id_producto;
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER `tr_updStockCompraAnular` AFTER UPDATE ON `purchases`
 FOR EACH ROW BEGIN
  UPDATE products p
    JOIN purchase_details di
     ON di.id_producto = p.id
     AND di.purchase_id = new.id
     JOIN purchases pu
     ON di.purchase_id = pu.id
     set p.stock = p.stock + di.cantidad WHERE pu.status = 'VALIDADO';
end;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER `tr_updStockCompraAnularZZ` AFTER UPDATE ON `purchases`
 FOR EACH ROW BEGIN
  UPDATE products p
    JOIN purchase_details di
      ON di.id_producto = p.id
     AND di.purchase_id = new.id
     JOIN purchases pu
     ON di.purchase_id = pu.id
     set p.stock = p.stock - di.cantidad WHERE pu.status = 'CANCELADO';
end
//
DELIMITER ;



 JOIN purchases pu
     ON di.purchase_id = pu.id


DELIMITER //
CREATE TRIGGER `tr_updStockVenta` AFTER INSERT ON `sale_details`
 FOR EACH ROW BEGIN
 UPDATE products SET stock = stock - NEW.cantidad 
 WHERE products.id = NEW.id_producto;
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER `tr_updStockVentaAnular` AFTER UPDATE ON `sales`
 FOR EACH ROW BEGIN
  UPDATE products p
    JOIN sale_details dv
      ON dv.id_producto = p.id
     AND dv.sale_id= new.id
     JOIN purchases pu
     ON di.purchase_id = pu.id

     set p.stock = p.stock + dv.cantidad;
end;  
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER `tr_updStockVentaAnularZZ` AFTER UPDATE ON `sales`
 FOR EACH ROW BEGIN
  UPDATE products p
    JOIN sale_details dv
      ON dv.id_producto = p.id
     AND dv.sale_id= new.id
     JOIN sales sa 
     ON dv.sale_id = sa.id
     set p.stock = p.stock - dv.cantidad WHERE sa.status = 'VALIDADO';
end;  
//
DELIMITER ;
