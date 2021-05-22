if NOT EXISTS(select * from kullanici where eposta='0')
begin
	insert into kullanici (eposta, sifre, isim, yas) 
	values('0', '0', '0', 0)
end