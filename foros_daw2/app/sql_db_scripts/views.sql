create or replace view daw2_v_foros_usuarios_creadores
as
select f.*, u.login
from daw2_foros f left join daw2_usuarios u
on f.creador_usuario_id = u.id
;