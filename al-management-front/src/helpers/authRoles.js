export const isAdmin = () => {
  const roles = JSON.parse(sessionStorage.getItem('user'))?.roles;
  return roles.includes('admin');
}

export const getHeaders = () => {
  const userToken = JSON.parse(sessionStorage.getItem('user'))?.token;
  const config = {
    headers: { Authorization: `Bearer ${userToken}` 
  }};

  return userToken ? config : window.alert('Debe loguearse en el sistema.')
}