
/* Namespaces */

class __NS
{
    static __namespaceCollection = [];
}

class Namespace
{
    constructor ()
    {
        let name = this.constructor.name;

        // Invoke 'self' constructor function
        this.invoke(name);
    }

    static staticConstructor ()
    {
        let has = __NS.__namespaceCollection.find(item => item === this);

        if(has)
        {
            return;
        }

        __NS.__namespaceCollection.push(this);

        // This namespace's name
        let name = this.name;

        if(!this?.[name])
        {
            return;
        }

        // Invoke self static constructor
        this.invoke(this.name);
    }

    invoke (funcname, ...params)
    {
		try
		{
			// If instead it is a common function
			return this?.[funcname](...params);
        }
        catch(ex)
		{
            return null;
        }
    }

	invokeGet (funcname)
	{
		return this?.[funcname];
	}

	invokeSet (funcname, value)
	{
		this[funcname] = value;
	}

    static invoke (funcname, ...params)
    {
        // Checks for static constructor of function
        this.staticConstructor();

        try
		{
			// If instead it is a common function
			return this?.[funcname](...params);
        }
        catch(ex)
		{
            return null;
        }
    }

	static invokeGet (funcname)
	{
		return this?.[funcname];
	}

	static invokeSet (funcname, value)
	{
		this[funcname] = value;
	}
}

class Gio extends Namespace
{
	#name = '';

	Gio ()
	{
	    console.log('starting');
	}

	beckon ()
	{
		console.log(this.#name + '! This is the name I call for!');
	}

	set Name (val)
	{
		this.#name = val;
	}

	get Name ()
	{
		return this.#name;
	}
}

const a = new Gio();

a.invokeSet('Name', 'Gio Bruno Magnos de Brito');

console.log(a.invokeGet('Name'));

a.invoke('beckon');
