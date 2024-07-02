<style>
#snackBardiv{
    position: fixed;
    width: 100vw;
    justify-content: center;
    bottom: 10%;
    z-index: 10000000;
}
#snackBarContent{
    background-color: #333333;
    color: #fff;
    padding: 10px;
    border-radius: 10px;
    font-size: 1rem;
}
@keyframes hideSnack {
    0%{
        opacity: 1;
    }
    100%{
        opacity: 0;
    }
}
</style>

<div id="snackBardiv" style="display: none;">
   <div id="snackBarContent"></div>
</div>