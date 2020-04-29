#PHP 连接虚谷数据库的驱动demo示例
## PDO for Xugu
--------------
#使用说明  
(1) Linux请将libxugusql.so文件移动至/usr/lib64/目录下  
(2) windows请将 动态库 php_pdo_xugusql.dll XGCSQL.dll 放入Path环境或php 的对应路径下

示例代码主要演示以下几点功能：  
(1)  通过连接字符串连接虚谷数据库；  
(2)  执行DDL、不带参数的DML语句；  
(3)  执行不带参数的DQL语句；
(4)  执行带参数的DML语句；  
(5)  执行带参数的DQL语句；  
(6)  事务提交方法的使用；  
若用户实际环境与当前驱动环境不一致，可能会出现不可预计的问题；
其它代码编写用法请参见 https://www.php.net/pdo


