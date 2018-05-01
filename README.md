
# Cold_Chain_Logistic_Server
## intruduction
> The interface of Cold_Chain_logistic APP.

go to client.[click here](https://github.com/LizYang13/Cold_Chain_logistic)

## interface document
###  登录
- 请求参数

|字段  | 描述 | 类型||
|-----|------|-----|
| account  |账户| String|
| pwd  |密码| String | 

- URL
http://192.168.56.1:8080/project/Cold_Chain_Logistic/login.php?account=liz&pwd=123

- 请求方式

> GET

- 响应参数

| code| message| data |
|-----|------|-----|
| 200 | login success| null |
| 401 | no account  | null |
| 402 | no internet | null |
| 403 |  pwd not match | null |


### 注册
- 请求参数

|字段  | 描述 | 类型||
|-----|------|-----|
| account  |账户| String|
| pwd  |密码| String | 
| signature|签名| String|
| nickname|昵称| String | 


- URL
http://192.168.56.1:8080/project/Cold_Chain_Logistic/register.php?account=liz&pwd=123&signature=123&nickname=123

- 请求方式
> POST

- 响应参数

| code | message| data |
|-----|------|-----|
| 200| register success| null |
| 401| duplicated account| null |
| 402 | no internet | null |

### 查询IMSI
- 请求参数

|字段  | 描述 | 类型||
|-----|------|-----|
| account  |账户| String|


- URL
http://192.168.56.1:8080/project/Cold_Chain_Logistic/query_imsi.php?account=liz

- 请求方式
> GET

- 响应参数

| code | message| data |
|-----|------|-----|
| 200| query success| data (string 数组)|
| 402 | no internet | null |

### 储存IMSI
- 请求参数

|字段  | 描述 | 类型||
|-----|------|-----|
| account  |账户| String|


- URL
http://192.168.56.1:8080/project/Cold_Chain_Logistic/save_imsi.php?imsi=123&account=123

- 请求方式
>GET

- 响应参数

| code | message| data |
|-----|------|-----|
| 200| save success| data (string 数组) |
| 401 | duplicated  IMSI| null |
| 402 | no internet | null |


