if NOT EXISTS(select * from kullanici where eposta='eposta1')
begin
	insert into kullanici (eposta, sifre, isim, yas) 
	values('eposta1', 'sifre', 'isim', 15)
end