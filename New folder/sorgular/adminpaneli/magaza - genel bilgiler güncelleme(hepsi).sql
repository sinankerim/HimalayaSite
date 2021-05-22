update magaza set magazaisim='x' where magazaid=0 /*magazaismi değiştirme*/;
update magaza set magazasifre='x' where magazaid=0 /*magazasifre değiştirme*/;
update magaza set telefon='x' where magazaid=0 /*magaza telefon no değiştirme*/;
update magaza set adres='x' where magazaid=0 /*magaza adres değiştirme*/;
update magaza set resim='x' where magazaid=0 /*magaza logo/resim değiştirme*/;

select * from magaza where magazasifre='x'; /*magaza sifresi geğiştirebilmerk için eski şifreyi sorgulamak için kullanılacak sorgu*/;

if NOT EXISTS(select * from magaza where magazaid=0)  /*magazayi silme magaza ile beraber bütün magaza yorumlarını ve satislari siler*/
begin
	delete from magaza where magazaid=0;
	delete from satis where mid=0;
	delete from myorum where mid=0;
end